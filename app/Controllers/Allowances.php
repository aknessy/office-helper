<?php

namespace App\Controllers;

use Config\Modules;

class Allowances extends BaseController
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
     * Model for deductions
     * @Model
     */
    private $allowance;

    /**
     * Validates user input
     * @Validation
     */
    private $validation;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->allowance = new \App\Models\AllowanceModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
        $this->validation = \Config\Services::validation();
    }

    /**
     * Index Page for the ALlowances Controller
     * 
     * @param string $file_no
     */
    public function index(string $file_no)
    {

    }

    /**
     * Creates allowances for the staff with the Nominal Roll ID
     * 
     * @param int $id
     */
    public function add(int $id)
    {
        helper('form');

        if($this->request->is('post'))
        {
            $posts = $this->request->getPost();

            if(! $this->validation->run($posts, 'allowance_rules'))
            {
                return redirect()->back()->withInput();
            }else{
                $date = (string)$this->request->getPost('year');

                $update_array = [
                    'hazard' => (NULL == $this->request->getPost('hazard') ? 0.0 : floatval($this->request->getPost('hazard'))),
                    'responsibility' => (NULL == $this->request->getPost('responsibility') ? 0.0 : floatval($this->request->getPost('responsibility'))),
                    'entertainment' => (NULL == $this->request->getPost('entertainment') ? 0.0 : floatval($this->request->getPost('entertainment'))),
                    'drivers' => (NULL == $this->request->getPost('drivers') ? 0.0 : floatval($this->request->getPost('drivers'))),
                    'date' => $date
                ];

                if($this->allowance->update($id, $update_array))
                    session()->setFlashdata('flashSuccess', 'Allowances for staff with ID: `' . $id . '` have been saved!');
                else
                    session()->setFlashdata('flashError', 'Allowances for staff with ID: `' . $id . '` were not saved!');
                
                return redirect()->back();
            }
        }else{
            $saved_allowances = $this->allowance->find($id);

            $data['allowance'] = $saved_allowances;
            $data['title'] = self::$page_title = 'Add Staff Allowances';
            $data['subview'] = 'allowance/add';
            $data['validation'] = $this->validation;
            $data['uri'] = $this->uri;
            return view('layouts/main', $data);
        }
    }

}