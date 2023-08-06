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
     * Mirrors the created StaffModel Class
     * @Model
     */
    protected $staff;

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->staff = new \App\Models\StaffModel();
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

    public function fetch_ajax(){
        $method = $this->input->post('method');
        $search_term = $this->input->post('term');

        if(isset($method, $search_term)){
            if($method == 'ajax'){
                $staff1 = $this->staff->where('file_no', esc($search_term))->findAll();
                $staff2 = $this->staff->where('staf_name', esc($search_term))->findAll();

                if($staff1){

                }
                
            }
        }
    }
}
