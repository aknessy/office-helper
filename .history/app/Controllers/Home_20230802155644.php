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

    public function search(){
        
        helper('form');

        $search_term = $this->request->getPost('term');
        
        if(!$this->request->is('post')){
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        
        if(isset($search_term)){
            $first_query = $this->staff->where('file_no', ucwords(esc($search_term)))->findAll();
            $second_query = $this->staff->where('staff_name', ucwords(esc($search_term)))->findAll();
            
            if($first_query){
                if($first_query[0]['rank'] == 'REC')
                    return json_encode(['message' => 'Nothing to display)

                return view('home/payslip.php', $first_query[0]);
            }
            elseif($second_query){
                return $second_query;
            }
            else{
                return json_encode(['Message'=>'Your search term returned 0 results!']);
            }
            
        }
    }
}
