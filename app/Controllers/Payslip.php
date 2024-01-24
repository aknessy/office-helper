<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Payslip extends BaseController
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
     * Mirrors the Staff Salary Model Class
     * @Model
     */
    protected $salary_model;

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
        $this->salary_model = new \App\Models\SalaryModel();

        $this->validation = \Config\Services::validation();
    }

    /**
     * Index page for the payslip module
     * 
     * @param None
     * @return String
     */
    public function index()
    {
        $data['title'] = self::$page_title . ' Payslip';
        $data['subview'] = 'payslip/index';
        $data['uri'] = $this->uri;
        
        return view('layouts/main', $data);
    }

    /**
     * Searches for a staff with the given search term and date
     * 
     * @param string $searchTerm
     * @param string $date
     * 
     * @return void
     */
    public function withterms(string $searchTerm, string $date)
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
                $salary = $this->salary_model->findSalaryByGrade($record[0]->grade_level, $record[0]->step, $date_year);
                               
                if(NULL == $salary){
                    session()->setFlashdata('flashError', 'No salary defined for Grade level: ' . $record[0]->grade_level . '/' . $record[0]->step . '!');
                    session()->setTempdata('referer', 'payslip/withterms/' . $search_term . '/'. $date, 600);
                    return redirect()->to('staff/create-salary/' . $record[0]->grade_level . '/' . $record[0]->step);
                }

                $account = $this->accounting_model->where('nominal_roll_id', $id)->findAll();
                $deductions = $this->deductions_model->where('nominal_roll_id', $id)->findAll();

                /**
                 * Calculate staff allowance from the returned salary
                 */
                $elec = floatval($salary[0]->hazard);
                $res = (NULL == $salary[0]->responsibility) ? 0.0 : floatval($salary[0]->responsibility);
                $ent = (NULL == $salary[0]->entertainment) ? 0.0 : floatval($salary[0]->entertainment);
                $drv = (NULL == $salary[0]->drivers) ? 0.0 : floatval($salary[0]->drivers);

                $total_allowances = $elec + $res + $ent + $drv;
                $total_deductions = $this->deductions_model->total_deductions($id, $date_year);

                if(empty($account[0]['bank_code'])) {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return redirect()->to('accounts/add/' . $account[0]['id']);
                }

                if(empty($deductions[0]['tax'])) {
                    /**
                     * The status code helps to determine what kind of redirect that should be handled by the client
                     */
                    return redirect()->to('deductions/add/' . $account[0]['id']);
                }

                $net_pay = (float)($salary[0]->monthly_consolidated_salary - $total_deductions);
                $total_emolument = (float)($net_pay + $total_allowances);
                
                $data['result'] = $record[0];
                $data['account_records'] = $account[0];
                $data['deduction_records'] = $deductions[0];
                $data['salary'] = $salary[0];
                $data['total_allowance'] = $total_allowances;
                $data['total_deduction'] = $total_deductions;

                $data['netpay'] = $net_pay;
                $data['emolument'] = $total_emolument;
                $data['payslip_date'] = $date;
                $data['subview'] = 'payslip/payslip';
                $data['title'] = self::$page_title = 'Payslip';
                $data['uri'] = $this->uri;

                return view('layouts/main', $data);
            }else{
                session()->setFlashdata('flashError', 'No records found for the staff with File No.: INEC/CRS/P/' . $search_term);
                return redirect()->to('payslip');
            }
        }
    }
}
