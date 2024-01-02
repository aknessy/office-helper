<?php

namespace App\Controllers;

use Config\Modules;

class Accounts extends BaseController
{
    /**
    * @String
    **/
    private static $page_title = 'Office Helper - ';

    /**
     * URI
     * @var URI
     */
    private $uri;

    /**
     * Model for deductions
     * @var Model
     */
    private $account;

    /**
     * Validates user inputs
     * @var Validation
     */
    private $validation;

    /**
     * Staff Model
     * @var Model
     */
    private $staff;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->account = new \App\Models\AccountingModel();
        $this->staff = new \App\Models\StaffModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
    }

    public function index ($file_no)
    {
        // $data['title'] = self::$page_title . 'Staff Account';
        // $data['subview'] = 'home/staff_account';
        // return view('layouts/main', $data);
    }

    /**
     * 
     */
    public function add($id)
    {
        helper('form');

       if($this->request->is('post'))
       {
        $posts = $this->request->getPost();

        if(! $this->validation->run($posts, 'add_accounts_rules'))
        {
            return redirect()->back()->withInput();
        }else{
            $post_bank_name = (string)strtoupper((string)$this->request->getPost('bank_name'));
            $bank_name = explode('-', $post_bank_name)[0];
            $bank_code = explode('-', $post_bank_name)[1];

            $acct_num = (string)$this->request->getPost('acct_num');
            $sort_code = (string)$this->request->getPost('sort_code');

            $single_staff = $this->staff->find($id);
            
            $update_data = [
                'bank_name' => $bank_name,
                'account_num' => $acct_num,
                'bank_code' => $bank_code,
                'sort_code' => $sort_code,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            if($this->account->update($id, $update_data))
                session()->setFlashdata('flashSuccess', 'Account information for: "' . $single_staff->staff_name . '" has been saved!');
            else
                session()->setFlashdata('flashError',  'Account information for: "' . $single_staff->staff_name . '" has not been saved!');
            
            return redirect()->back();
        }
       }else{
            $saved_account = $this->account->find($id);

            $data['banks'] = $this->account->bank_names_codes();

            $data['account'] = $saved_account;
            $data['title'] = self::$page_title = 'Add Staff Account';
            $data['subview'] = 'account/add';
            $data['validation'] = $this->validation;
            $data['uri'] = $this->uri;
            
            return view('layouts/main', $data);
       }
    }

}