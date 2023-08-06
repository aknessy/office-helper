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
        helper('form');

        $post = $this->request->getPost(['method', 'term']);
        $ser_term = $post['term'];
        $method = $post['method'];

        if(isset($method, $search_term)){
            if($method == 'ajax'){
                $first_query = $this->staff->where('file_no', esc($search_term))->findAll();
                $second_query = $this->staff->where('staf_name', esc($search_term))->findAll();

                if($first_query){
                    var_dump($first_query);
                }

                if($second_query){
                    var_dump($second_query);
                }
            }
        }
    }
}
