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

    /**
     * Mirrors the created Accounting Model Class
     * @Model
     */
    protected $accounting;

    /**
     * Validation Service
     */
    protected $validation;

    public function __construct()
    {
        $this->helpers = ['breadcrumb'];
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->staff = new \App\Models\StaffModel();
        $this->accounting = new \App\Models\AccountingModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['title'] = self::$page_title . 'Home';
        $data['subview'] = 'home/index';
        $data['uri'] = $this->uri;
        return view('layouts/main', $data, ['saveData' => false]);
    }

    public function manual()
    {
        helper('form');

        if($this->request->is('post'))
        {
            //var_dump($this->rules($this->request->getPost()));die;
            $this->validation->setRuleGroup('manual_payslip');

            if(! $this->validation->run()){
                return redirect()->back()->withInput();
            }else{

            }
        }else{
            $data['title'] = self::$page_title . 'Manual Payslip Generation';
            $data['subview'] = 'home/manual';
            $data['uri'] = $this->uri;
            return view('layouts/main', $data);
        }
    }

    public function search(){
        
        helper('form');

        $search_term = $this->request->getPost('term');
        
        if(!$this->request->is('post')){
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        }
        
        if(isset($search_term))
        {
            $search_term = strtoupper(esc($search_term));
            
            $first_query = $this->staff->where('file_no', $search_term)->findAll();
            $second_query = $this->staff->where('staff_name', $search_term)->findAll();
            
            if($first_query)
            {
                $id = $first_query[0]['id'];
                $account = $this->accounting->where('nominal_roll_id', $id)->findAll();

                $data['result'] = $first_query[0];
                $data['account_records'] = $account[0];
                return view('home/payslip', $data);
            }elseif($second_query){
                return $second_query;
            }else{
                $data['message'] = 'Your search term returned 0 results!';
                return view('fragments/no-record', $data);
            }
            
        }
    }

    public function rules($target){
        $array = [];

        if(is_array($target)){
            foreach($target as $key => $value){
                $array[] =  [
                    $key => [
                        'rules' => 'required|trim|xss_clean',
                        'errors' => [
                            'required' => '{field} is required'
                        ]
                    ]
                    
                ];
            }
        }

        return $array;
    }
}
