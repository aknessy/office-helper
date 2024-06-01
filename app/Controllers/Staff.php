<?php

namespace App\Controllers;

use Config\Modules;

class Staff extends BaseController
{
    /**
    * @String
    **/
    private static $page_title = 'Office Helper - ';

    /**
     * URI
     * @mixed
     */
    private $uri;

    /**
     * Mirrors the created StaffModel Class
     * @Model
     */
    protected $staff_model;

    /**
     * Mirrors the created StatesModel Class
     * @Model
     */
    protected $states_model;

    /**
     * Mirrors the staff salary model class
     * @Model
     */
    protected $staff_salary;

    /**
     * Mirrors the created StatesLgasModel Class
     * @Model
     */
    protected $states_lgas_model;

    /**
     * Mirrors the Record of Service Model
     * @Model
     */
    protected $record_of_service_model;

    /**
     * Validates data
     * @Validation
     */
    private $validation;

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());

        $this->staff_model = new \App\Models\StaffModel();
        $this->staff_salary = new \App\Models\SalaryModel();
        $this->states_model = new \App\Models\StatesModel();
        $this->states_lgas_model = new \App\Models\StatesLgasModel();
        $this->record_of_service_model = new \App\Models\RecordOfServiceModel();
        

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        helper('retirement_calc');
       
        $data['title'] = self::$page_title . 'Staff Nominal Roll';
        $data['staff'] = $this->staff_model->paginate(20);
        $data['pager'] = $this->staff_model->pager;
        $data['uri'] = $this->uri;
        $data['subview'] = 'staff/staff_list';
        
        return view('layouts/main', $data);
    }

    public function verify($file_no)
    {
        $file_no = strtoupper(str_replace('_', '.', $file_no));

        $data['title'] = self::$page_title . 'Staff Verification';
    }

    public function create_salary($grade, $step)
    {
        helper('form');

        if($this->request->is('post'))
        {
            $posts = $this->request->getPost();

            if(! $this->validation->run($posts, 'create_salary'))
            {
                return redirect()->back()->withInput();
            }else{
                $year = $posts['year'] ? $posts['year'] : date('Y');
                $g = $posts['grade'] ? $posts['grade'] : $grade;
                $s = $posts['step'] ? $posts['step'] : $step;

                $check = $this->salary_model->findSalaryByGrade($g, $s, $year);

                if($check){
                    session()->setFlashdata('flashWarning', 'Salary already exists for the given grade level, step & year! Please use the appropriate module if you wish to update.');
                    return redirect()->back();
                }

                $salary_record  = [
                    'grade' => $g,
                    'step' => $s,
                    'annual_consolidated_salary' => $posts['annual_sal'],
                    'monthly_consolidated_salary' => $posts['monthly_sal'],
                    'hazard' => $posts['hazard'],
                    'responsibility' => $posts['responsibility'],
                    'entertainment' => $posts['entertainment'],
                    'drivers' => $posts['drivers'],
                    'year' => $year,
                    'created_at' => date('Y-m-d')
                ];

                $referer = session()->getTempdata('referer');

                if($this->staff_salary->insert($salary_record)){
                    session()->setFlashdata('flashSuccess', $year . ' salary for Grade Level ' . $grade . '/' . $step . ' saved!');
                    return redirect()->to($referer);
                }else{
                    session()->setFlashdata('flashError', 'Failed to save salary for the selected grade level & step');                
                    return redirect()->back()->withInput();
                }
            }
        }else{
            $data['title'] = self::$page_title . 'Define Salary';
            $data['subview'] = 'salary/add';
            $data['uri'] = $this->uri;
            
            return view('layouts/main', $data);
        }
    }

    public function add()
    {
        helper('form');
        helper('retirement_calc');
        helper('rand_string');
        
        if($this->request->is('post')){
            $posts = $this->request->getPost();
            
            if(!$this->validation->run($posts, 'add_staff_record')){
                return redirect()->back()->withInput();
            }else{
                $file_nos = $this->staff_model->findColumn('file_no');
                $latest_in_file = 0;
                
                if($file_nos){
                    foreach($file_nos as $k => $v)
                    {
                        $n = intval(explode('.', $v)[1]);
                        if($n > $latest_in_file)
                            $latest_in_file = $n;
                    }
                }

                $count_all_staff = count($this->staff_model->findAll());
                $uid = random_string('alnum',4) . '-' . random_string('alnum',4) . '-' . mt_rand(1, $count_all_staff) . '-' . random_string('alnum',8);

                $new_staff_file_num = ($latest_in_file == 0 ? mt_rand(100, 999) : ($latest_in_file + 1));
                $staff_name = $posts['lname'] . ', ' . $posts['fname'] . ' ' . $posts['mname'] . '(' . $posts['title'] . ')';
                
                if($this->staff_model->findByName($staff_name)){
                    session()->setFlashData('flashWarning', 'Staff already exists!');
                    return redirect('staff/add-record');
                }

                $date_of_ret = retire_when($posts['date_of_birth'], $posts['first_appt']);
                $mode = retire_when($posts['date_of_birth'], $posts['first_appt'], 'mode');

                $record = [
                    'uid' => strtoupper($uid),
                    'file_no' => 'P.'.$new_staff_file_num,
                    'staff_name' => strtoupper($staff_name),
                    'gender' => $posts['gender'],
                    'marital_status' => $posts['marital_status'],
                    'rank' => $posts['rank'],
                    'grade_level' => $posts['grade_level'],
                    'step' => $posts['step'],
                    'qualification' => json_encode($posts['qualification']),
                    'cadre' => strtoupper($posts['cadre']),
                    'date_of_birth' => $posts['date_of_birth'],
                    'first_appt' => $posts['first_appt'],
                    'confirmation' => (NULL == $posts['confirmation'] ? NULL : $posts['confirmation']),
                    'state_of_origin' => $posts['state_of_origin'],
                    'lga_of_origin' => $posts['lga_of_origin'],
                    'phone' => $posts['phone'],
                    'email' => $posts['email'],
                    'pfa' => $posts['pfa'],
                    'rsa_pin' => $posts['rsa_pin'],
                    'date_of_ret' => $date_of_ret,
                    'mode_of_ret' => $mode,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1
                ];

                if($this->staff_model->insert($record)){
                    session()->setFlashdata('flashSuccess', 'New record added to the nominal roll');
                    return redirect()->to('staff/add-image/' . $uid);
                }else{
                    session()->setFlashdata('flashError', 'Failed to create a record with file number: `P.' . $new_staff_file_num .'`. Try again, Please!');                
                    return redirect()->back()->withInput();
                }
            }
        }

        $data['title'] = self::$page_title . 'New Nominal Roll Entry';
        $data['subview'] = 'staff/add';
        $data['uri'] = $this->uri;
        $data['states'] = $this->states_model->getStates();

        return view('layouts/main', $data);
    }

    public function add_image($uid)
    {
        helper('form');

        if($this->request->getFile('imageName'))
        {
            $validationRule = [
                'imageName' => [
                    'label' => 'New Staff Photo',
                    'rules' => [
                        'uploaded[imageName]',
                        'is_image[imageName]',
                        'mime_in[imageName,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[imageName,100]',
                        'max_dims[imageName,1024,768]',
                    ],
                ],
            ];

            if(! $this->validate($validationRule))
                return redirect()->back();
            
            $img = $this->request->getFile('imageName');

            if(! $img->isValid())
                session()->setFlashData('flashError', 'Upload file is invalid!');

            $img_ext = $img->getClientExtension();
            $save_as = $uid . '.' . $img_ext;

            $img->move(ROOTPATH . 'public/assets/uploads/images', $save_as, TRUE);

            if($img->hasMoved()){
                $where_params = [
                    'photo' => $save_as,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => 1
                ];

                $this->staff_model->updateStaff($uid, $where_params);

                if($this->staff_model->affectedRows()){
                    session()->setFlashData('flashSuccess', 'Staff photo uploaded successfully!');
                    return redirect()->to('staff/staff-view/' . $uid);
                }else
                    session()->setFlashData('flashError', 'Photo uploaded but not saved!'); 
            }else
                session()->setFlashData('flashError', 'Image upload failed! Please try again.');

            return redirect()->to('staff/add-image/' . $uid);
        }

        $data['title'] = self::$page_title . 'New Nominal Roll Entry - Staff Photo';
        $data['subview'] = 'staff/add_image';
        $data['uri'] = $this->uri;

        return view('layouts/main', $data);
    }

    public function view_staff($uid)
    {
        helper('form');
        helper('retirement_calc');
        
        $staff = $this->staff_model->findByUID($uid);
        $promotions = $this->record_of_service_model->recordOfPromotion(intval($staff[0]->id));
        $transfers = $this->record_of_service_model->recordOfTransfer(intval($staff[0]->id));
       
        $data['rating'] = 92;
        $data['staff'] = $staff;

        $data['promotion_record'] = $promotions[0]->record_of_prom;
        $data['transfer_record'] = $transfers[0]->record_of_trans;

        $data['title'] = self::$page_title . 'View Staff';
        $data['states'] = $this->states_model->getStates();
        $data['subview'] = 'staff/view';
        $data['uri'] = $this->uri;

        return view('layouts/main', $data);
    }

    public function add_service_record()
    {
        helper('form');

        if($this->request->is('post'))
        {
            $posts = $this->request->getPost();
            
            if(!$this->validation->run($posts, 'add_prom_record')){
                return redirect()->back()->withInput();
            }else{
                $record_is_for = $posts['record_for'];

                if($record_is_for == 'promotion'){
                    $create_record = $this->create_record_for_promotion($posts);
                    if($create_record)
                        session()->setFlashdata('flashSuccess', 'Staff promotional progress saved!');
                    else
                        session()->setFlashdata('flashError', 'Record for staff promotion could not be saved. Please try again!!');
                }

                return redirect()->back();
            }
        }else
            return redirect()->back();
    }

    public function fetch_staff()
    {
        helper('form');
        helper('retirement_calc');
        
        if($this->request->is('post'))
        {
            $this->validation->setRules([
                'query' => 'required|alpha_numeric_punct'
            ]);

            $validation_data = $this->request->getPost();
            
            if($this->validation->run($validation_data))
            {
                $query1 = $this->staff_model->findByName($validation_data['query']);
                $query2 = $this->staff_model->findByFileNum($validation_data['query']);
                $record = NULL;

                if($query1) $record = $query1;
                if($query2) $record = $query2;

                $data['staff'] = $record;

                echo view('staff/search_response', $data);
            }
        }
    }

    public function fetch_lgas()
    {
        helper('form');
        $states_lgas = [];

        if($this->request->is('post'))
        {
            $this->validation->setRules([
                'state' => 'required|integer'
            ]);

            $validation_data = $this->request->getPost();

            if($this->validation->run($validation_data))
                $states_lgas = $this->states_lgas_model->getLgas($validation_data['state']);
            
            return $this->response->setJSON($states_lgas);
        }
    }

    private function create_record_for_promotion($data)
    {
        helper('rand_string');

        if(!empty($data))
        {
            $rank = $data['rank'];
            $effective_from = $data['effective_date_of_prom'];
            $grade = $data['grade_level'];
            $step = $data['step'];
            $promotion_type = $data['type_of_promotion'];

            $uid = $data['uid'];
            $staff = $this->staff_model->findByUID($uid);
            $record = NULL;

            $record_of_promotion = [
                'uid' => random_string('alnum', 5),
                'rank' => $rank,
                'grade' => $grade,
                'step' => $step,
                'effective_date' => $effective_from,
                'type_of_promotion' => $promotion_type
            ];

            if($staff)
            {   $staffID = $staff[0]->id;
                $prev_prom_record = $this->record_of_service_model->recordOfPromotion($staffID)[0]->record_of_prom;
                
                $decode = json_decode($prev_prom_record);

                if($prev_prom_record)
                {                
                    foreach($decode as $key){
                        if($key->grade == $grade)
                            return false;

                        $effective_from_before = explode('-', $key->effective_date);
                        $effective_from_now = explode('-', $effective_from);

                        /**
                         * Checking to see if there is a collision of effective promotion dates by comparing
                         * years of previous promotional dates.
                         */
                        if($effective_from_before[0] == $effective_from_now[0])
                            return false;
                    }
                    
                    array_push($decode, $record_of_promotion);
                    $record = json_encode($decode);
                    
                    $update_rec = [
                        'record_of_prom' => $record,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => 1
                    ];
                    
                    $this->record_of_service_model->updateRecordOfService($staffID, $update_rec);

                    return $this->record_of_service_model->affectedRows() > 0;
                }else{
                    $record = json_encode([$record_of_promotion]);

                    $this->record_of_service_model->save(
                        [
                            'staff_id' => $staffID, 
                            'record_of_prom' => $record,
                            'record_created_by' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ]
                    );

                    return $this->record_of_service_model->insertID() > 0;
                }
            }
        }

        return false;
    }
}