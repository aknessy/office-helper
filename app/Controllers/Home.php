<?php

namespace App\Controllers;

class Home extends BaseController
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
    protected $staff;

    /**
     * Mirrors the created Accounting Model Class
     * @Model
     */
    protected $accounting;

    /**
     * Validation Service
     */
    protected $validation;

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->staff = new \App\Models\StaffModel();
        $this->accounting = new \App\Models\AccountingModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['title'] = self::$page_title . 'Home';
        $data['subview'] = 'home/index';
        $data['uri'] = $this->uri;
        return view('layouts/main', $data, ['saveData' => false]);
    }

    public function manual()
    {
        helper('form');

        if($this->request->is('post'))
        {
            $posts = $this->request->getPost();
            /**
             * Check that the submitted form has validly submitted values.
             * The `manual_payslip` is an array that contains the rules defined in
             * \Config\Validation 
             */
            if(! $this->validation->run($posts, 'manual_payslip')){
                return redirect()->back()->withInput();
            }else{
                $file_no = $this->request->getPost('file_no');
                $is_staff_exists = $this->staff->where('file_no', $file_no)->findAll();

                if(empty($is_staff_exists))
                    session()->setFlashdata('flashError', "Staff with file number: {$file_no} does not exist!");
                    
                $first_name = $this->request->getPost('firstname');
                $middle_name = $this->request->getPost('middlename');
                $last_name = $this->request->getPost('lastname');
                
                $gross = $this->request->getPost('basic');

                /**
                 * Earnings
                 */
                $transport = (float)$this->request->getPost('transport');
                $electoral = (float)$this->request->getPost('electoral');
                $responsibility = (float)$this->request->getPost('responsibility');
                $entertainment = (float)$this->request->getPost('entertainment');
                $drivers_allowance = (float)$this->request->getPost('driver_allowance');
                $meal = (float)$this->request->getPost('meal');
                $utility = (float)$this->request->getPost('utility');
                $overtime = (float)$this->request->getPost('overtime');
                $housing = (float)$this->request->getPost('housing');

                $total_earnings = ($transport + $electoral + $responsibility + $entertainment + $drivers_allowance + $meal + $utility + $overtime + $housing);

                /**
                 * Deductions
                 */
                $cps = (float)$this->request->getPost('cps');
                $tax = (float)$this->request->getPost('tax');
                $co_operative = (float)$this->request->getPost('co_operative');
                $co_operative_dues = (float)$this->request->getPost('co_operative_dues');
                $co_operative_loan = (float)$this->request->getPost('co_operative_loan');
                $nhf = (float)$this->request->getPost('nhf');
                $welfare_dues = (float)$this->request->getPost('welfare_dues');
                $misc = NULL !== $this->request->getPost('misc') ? (float)$this->request->getPost('misc') : 0.0;

                $total_deduction = ($cps + $tax + $co_operative + $co_operative_dues + $co_operative_loan + $nhf + $welfare_dues + $misc);

                $records = [
                    'file_no' => $file_no,
                    'staff_name' => ($first_name . ' ' . $middle_name . ' ' . $last_name),
                    'pay_point' => $this->request->getPost('paypoint'),
                    'month' => $this->request->getPost('month'),
                    'year' => $this->request->getPost('year'),
                    'gross' => $gross,
                    'transport' => $transport,
                    'electoral' => $electoral,
                    'responsibility' => $responsibility,
                    'entertainment' => $entertainment,
                    'driver_allowance' => $drivers_allowance,
                    'meal' => $meal,
                    'utility' => $utility,
                    'overtime' => $overtime,
                    'cps' => $cps,
                    'tax' => $tax,
                    'housing' => $housing,
                    'co_operative' => $co_operative,
                    'co_operative_dues' => $co_operative_dues,
                    'co_operative_loan' => $co_operative_loan,
                    'nhf' => $nhf,
                    'welfare_dues' => $welfare_dues,
                    'misc' => $misc,
                    'misc_desc' => NULL !== $this->request->getPost('misc_desc') ? $this->request->getPost('misc_desc') : '',
                ];

                $net_pay = ($gross - $total_deduction);
                $total_emolument = ($net_pay + $total_earnings);

                $records['total_earnings'] = $total_earnings;
                $records['total_deduction'] = $total_deduction;
                $records['total_emolument'] = $total_emolument;
                $records['net_pay'] = $net_pay;

                $data['subview'] = 'home/manual_payslip';
                $data['uri'] = $this->uri; 
                $data['records'] = $records;
                $data['title'] = self::$page_title . 'Manual Payslip Generation';
                
                session()->setFlashdata('flashSuccess', 'Pay slip generated for '. ucfirst((string)$first_name));
                return view('layouts/main', $data);
            }
        }else{
            $data['title'] = self::$page_title . 'Manual Payslip Generation';
            $data['subview'] = 'home/manual';
            $data['uri'] = $this->uri;
            return view('layouts/main', $data);
        }
    }

    public function search(){
        
        helper('form');

        $search_term = $this->request->getPost('term');
        
        if(!$this->request->is('post')){
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        
        if(isset($search_term))
        {
            $search_term = strtoupper(esc($search_term));
            
            $first_query = $this->staff->where('file_no', $search_term)->findAll();
            $second_query = $this->staff->where('staff_name', $search_term)->findAll();
            
            if($first_query)
            {
                $id = $first_query[0]['id'];
                $account = $this->accounting->where('nominal_roll_id', $id)->findAll();

                $data['result'] = $first_query[0];
                $data['account_records'] = $account[0];
                return view('home/payslip', $data);
            }elseif($second_query){
                return $second_query;
            }else{
                $data['message'] = 'Your search term returned 0 results!';
                return view('fragments/no-record', $data);
            }
            
        }
    }

    public function rules($target){
        $array = [];

        if(is_array($target)){
            foreach($target as $key => $value){
                $array[] =  [
                    $key => [
                        'rules' => 'required|trim|xss_clean',
                        'errors' => [
                            'required' => '{field} is required'
                        ]
                    ]
                    
                ];
            }
        }

        return $array;
    }
}
