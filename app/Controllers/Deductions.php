<?php

namespace App\Controllers;

use Config\Modules;

class Deductions extends BaseController
{
    /**
    * @String
    **/
    private static $page_title = 'Office Helper - ';

    /**
     * Model for deductions
     * @Model
     */
    private $deduction;

    /**
     * Model for Staff
     * @Model
     */
    private $staff;

    /**
     * Validates data
     * @Validation
     */
    private $validation;

    /**
     * Handles routing segments
     * @URI
     */
    private $uri;

    public function __construct()
    {
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
        $this->deduction = new \App\Models\DeductionModel;
        $this->validation = \Config\Services::validation();
        $this->staff = new \App\Models\StaffModel();
    }

    public function index ($file_no)
    {
        $data['title'] = self::$page_title . 'Staff Deductions';
    }

    /**
     * Creates deduction for the staff with the Nominal Roll ID or file number
     * 
     * @param int $id
     */
    public function add(int $id)
    {
        helper('form');

        if($this->request->is('post'))
        {
            $posts = $this->request->getPost();

            if(! $this->validation->run($posts, 'add_deduction'))
            {
                return redirect()->back()->withInput();
            }else{
                $date = (string)$this->request->getPost('date');

                $update_array = [
                    'co_operative' => (NULL == $this->request->getPost('co_operative') ? NULL : $this->request->getPost('co_operative')),
                    'co_operative_dues' => (NULL == $this->request->getPost('co_operative_dues') ? NULL : $this->request->getPost('co_operative_dues')),
                    'loan' => (NULL == $this->request->getPost('co_operative_loan') ? NULL : $this->request->getPost('co_operative_loan')),
                    'nhf' => (NULL == $this->request->getPost('nhf') ? NULL : $this->request->getPost('nhf')),
                    'tax' => (NULL == $this->request->getPost('tax') ? NULL : $this->request->getPost('tax')),
                    'cps' => (NULL == $this->request->getPost('cps') ? NULL : $this->request->getPost('cps')),
                    'year' => $date
                ];

                if($this->deduction->update($id, $update_array)){
                    session()->setFlashdata('flashSuccess', 'Deductions for staff with ID: `' . $id . '` has been saved!');
                        return redirect('deductions/add/' . $id);
                }else{
                    session()->setFlashdata('flashError', 'Deductions for staff with ID: `' . $id . '` was not saved!');
                        return redirect('deductions/add/' . $id);
                }
            }
        }else{
            $saved_deductions = $this->deduction->find($id);

            $data['deduction'] = $saved_deductions;
            $data['title'] = self::$page_title = 'Add Staff Deduction';
            $data['subview'] = 'deduction/add';
            $data['validation'] = $this->validation;
            $data['uri'] = $this->uri;
            return view('layouts/main', $data);
        }  
    }



}