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
     * Mirrors the staff salary model class
     * @Model
     */
    protected $staff_salary;

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
}