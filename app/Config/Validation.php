<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
        'custom_validation_template' => 'fragments/validation_errors',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $manual_payslip = [
        'month' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'Select Month for this payslip',
                'integer' => 'Month field was left blank'
            ]
        ],
        'year' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'File No. is required',
                'integer' => 'Year field was left blank'
            ]
        ],
        'file_no' => [
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'File No. is required'
            ]
        ],
        'firstname' => [
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Staff First Name is missing'
            ]
        ],
        'lastname' => [
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Staff Last Name is missing'
            ]
        ],
        'paypoint' => [
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Salary Pay point wasn\'t found'
            ]
        ],
        'basic' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'Gross salary is mandatory',
                'integer' => 'Gross salary must be either integer or float'
            ]
        ],
        'electoral' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'Electoral Hazard wasn\'t found',
                'integer' => 'Electoral Hazard must be integer or float'
            ]
        ],
        'cps' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'Contributory Pension wasn\'t found',
                'integer' => 'Contributory Pension is not an integer or float'
            ]
        ],
        'tax' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'Staff tax field is missing too',
                'integer' => 'Only integer values are permitted for Tax'
            ]
        ],
        'co_operative' => [
            'rules' => 'trim|integer',
            'errors' => [
                'integer' => 'Co-operative deduction wasn\'t found to be an integer or float',
            ]
        ],
        'nhf' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'National Housing Fund wasn\'t found',
                'integer' => 'NHF must be an integer or float'
            ]
        ],
        'welfare_dues' => [
            'rules' => 'required|trim|integer',
            'errors' => [
                'required' => 'Welfare Dues is missing as well',
                'integer' => 'Welfare Dues needs to be an integer'
            ]
        ]
    ];
}
