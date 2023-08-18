<?php

namespace App\Controllers;

use Config\Modules;

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
    protected $staff_model;

    /**
     * Mirrors the created Accounting Model Class
     * @Model
     */
    protected $accounting_model;

    /**
     * Mirrors the Allowances Model Class
     * @Model
     */
    protected $allowances_model;

    /**
     * Mirrors the Deduction Model Class
     * @Model
     */
    protected $deductions_model;

    /**
     * Validation Service
     */
    protected $validation;

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->staff_model = new \App\Models\StaffModel();
        $this->accounting_model = new \App\Models\AccountingModel();
        $this->allowances_model = new \App\Models\AllowanceModel();
        $this->deductions_model = new \App\Models\DeductionModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['title'] = self::$page_title . 'Home';
        $data['subview'] = 'home/index';
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
                $data['records'] = $records;
                $data['title'] = self::$page_title . 'Manual Payslip Generation';
                
                session()->setFlashdata('flashSuccess', 'Pay slip generated for '. ucfirst((string)$first_name));
                return view('layouts/main', $data);
            }
        }else{
            $data['title'] = self::$page_title . 'Manual Payslip Generation';
            $data['subview'] = 'home/manual';
            return view('layouts/main', $data);
        }
    }

    public function search(){
        
        helper('form');
        
        if(!$this->request->is('post')){
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        
        $search_term = $this->request->getPost('term');
        $date_picked = $this->request->getPost('date');

        if(isset($search_term, $date_picked))
        {
            $total_deductions = 0;
            $total_allowances = 0;
            $gross_to_date = 0;
            $tax_to_date = 0;

            $search_term = strtoupper(esc($search_term));
            $date_year = explode('-', esc($date_picked))[0];
            $date_month = explode('-', esc($date_picked))[1];
            
            $first_query = $this->staff_model->where('file_no', $search_term)->findAll();
            
            if($first_query)
            {
                //var_dump($first_query);die;
                $id = $first_query[0]['id'];//echo $id;die;
                $account = $this->accounting_model->where('nominal_roll_id', $id)->findAll();
                $deductions = $this->deductions_model->where('nominal_roll_id', $id)->findAll();
                $allowances = $this->allowances_model->where('nominal_roll_id', $id)->findAll();
                
               $total_allowances = $this->allowances_model->total_allowances($id, $date_year);
               $total_deductions = $this->deductions_model->total_deductions($id, $date_year);
                /**
                * Without wrapping the following in if..else statements, we'll get "<!-- X-DEBUG is not a valid JSON"... error
                * on the client due to JSON.parse being unable to parse the response.
                 */
                if(NULL == $account[0]['bank_code'] || $account[0]['bank_code'] == 0) 
                {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return view('fragments/redirect',
                            [
                                'message' => 'No account records found',
                                'status' => 1,
                                'staff_id' => $account[0]['id']
                        ]
                    );
                }

                if(NULL == $deductions[0]['tax'] || $deductions[0]['tax'] == 0)
                {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return view('fragments/redirect', 
                        
                                [
                                    'message' => 'No deduction records found',
                                    'status' => 2,
                                    'staff_id' => $account[0]['id']
                                ]
                            );
                    
                }

                if(NULL == $allowances[0]['hazard'] || $allowances[0]['hazard'] == 0){
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return view('fragments/redirect', 
                            [
                                'message' => 'No allowance records found',
                                'status' => 3,
                                'staff_id' => $account[0]['id']
                            ]
                        );     
                }

                $net_pay = (float)($first_query[0]['gross'] - $total_deductions);
                $total_emolument = (float)($net_pay + $total_allowances);
                    
                $data['result'] = $first_query[0];
                $data['account_records'] = $account[0];
                $data['deduction_records'] = $deductions[0];
                $data['allowance_records'] = $allowances[0];
                $data['total_allowance'] = $total_allowances;
                $data['total_deduction'] = $total_deductions;

                $data['netpay'] = $net_pay;
                $data['emolument'] = $total_emolument;
                $data['payslip_date'] = $date_picked;

                return view('home/payslip', $data);
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
