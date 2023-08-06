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
     * Mirrors the created StaffModel Clas
     */

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
    }

    public function index()
    {     
        $data['breadcrumbs'] = breadcrumbs($this->request->getPath());
        $data['title'] = self::$page_title . 'Home';
        $data['subview'] = 'home/index';
        $data['uri'] = $this->uri;
        return view('layouts/main', $data, ['saveData' => false]);
    }

    public function advanced(){
        $data['breadcrumbs'] = breadcrumbs($this->request->getPath());
        $data['title'] = self::$page_title . 'Advanced Search';
        $data['subview'] = 'home/advance';
        $data['uri'] = $this->uri;
        return view('layouts/main', $data, ['saveData' => false]);
    }
}
