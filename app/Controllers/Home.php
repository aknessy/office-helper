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
    }

    public function index()
    {
        $data['title'] = self::$page_title . 'Home';
        $data['subview'] = 'home/index';
        $data['uri'] = $this->uri;
        return view('layouts/home_layout', $data, ['saveData' => false]);
    }

}
