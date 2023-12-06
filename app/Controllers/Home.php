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
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
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
            $data['uri'] = $this->uri;
            $data['subview'] = 'home/manual';
            return view('layouts/main', $data);
        }
    }

    /**
     * Searches for a staff with the given search term and date
     * 
     * @param string $searchTerm
     * @param string $date
     * 
     * @return void
     */
    public function payslip(string $searchTerm, string $date)
    { 
        if(isset($searchTerm, $date))
        {
            $total_deductions = 0;
            $total_allowances = 0;
            $gross_to_date = 0;
            $tax_to_date = 0;

            $search_term = strtoupper(esc($searchTerm));
            $date_year = explode('-', esc($date))[0];
            
            $first_query = $this->staff_model->where('file_no', $search_term)->findAll();
            $second_query = $this->staff_model->findByName($search_term);
            $record = NULL;
            
            if($first_query) 
                $record = $first_query;

            if($second_query)
                $record = $second_query;
                
            //var_dump($record);die;
            if($record)
            {
                $id = $record[0]->id;
                $account = $this->accounting_model->where('nominal_roll_id', $id)->findAll();
                $deductions = $this->deductions_model->where('nominal_roll_id', $id)->findAll();
                $allowances = $this->allowances_model->where('nominal_roll_id', $id)->findAll();

                $total_allowances = $this->allowances_model->total_allowances($id, $date_year);
                $total_deductions = $this->deductions_model->total_deductions($id, $date_year);

                /**
                 * Without wrapping the following in if..else statements, we'll get "<!-- X-DEBUG is not a valid JSON"... error
                 * on the client due to JSON.parse being unable to parse the response.
                 */
                if(null == $account[0]['bank_code'] || $account[0]['bank_code'] == 0) {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return redirect()->to('accounts/add/' . $account[0]['id']);
                }

                if(null == $deductions[0]['tax'] || $deductions[0]['tax'] == 0) {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return redirect()->to('deductions/add/' . $account[0]['id']);
                }

                if(null == $allowances[0]['hazard'] || $allowances[0]['hazard'] == 0) {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return redirect()->to('allowances/add/' . $account[0]['id']);
                }

                $net_pay = (float)($record[0]->gross - $total_deductions);
                $total_emolument = (float)($net_pay + $total_allowances);
                var_dump($allowances);die;
                $data['result'] = $record[0];
                $data['account_records'] = $account[0];
                $data['deduction_records'] = $deductions[0];
                $data['allowance_records'] = $allowances[0];
                $data['total_allowance'] = $total_allowances;
                $data['total_deduction'] = $total_deductions;

                $data['netpay'] = $net_pay;
                $data['emolument'] = $total_emolument;
                $data['payslip_date'] = $date;

                return view('home/payslip', $data);
            }else
                return view('fragments/no-record');
        }
    }
}
