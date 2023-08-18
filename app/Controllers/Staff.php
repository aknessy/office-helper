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


    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->staff_model = new \App\Models\StaffModel();
    }

    public function verify($file_no)
    {
        $file_no = strtoupper(str_replace('_', '.', $file_no));

        $data['title'] = self::$page_title . 'Staff Verification';
    }
}