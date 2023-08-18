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

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->account = new \App\Models\AccountingModel();
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
       if($this->request->is('post'))
       {

       }else{
            $saved_account = $this->account->find($id);

            $data['account'] = $saved_account;
            $data['title'] = self::$page_title = 'Add Staff Account';
            $data['subview'] = 'account/add';
            $data['validation'] = $this->validation;
            $data['uri'] = $this->uri;
            return view('layouts/main', $data);
       }
    }

}