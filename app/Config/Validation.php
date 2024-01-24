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
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'National Housing Fund wasn\'t found',
                'integer' => 'NHF must be an integer or float'
            ]
        ],
        'welfare_dues' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Welfare Dues is missing as well',
                'integer' => 'Welfare Dues needs to be an integer'
            ]
        ]
    ];

    /**
     * The following rules are used in by add method of th Deduction
     * Constroller to create/update a staff's deductions
     * 
     * @array
     */
    public array $add_deduction = [
        'date' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Date field is required'
            ]
        ],
        'welfare' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'Welfare Deduction is required',
                'integer' => 'Welfare must be an integer/float'
            ]
        ],
        'co_operative' => [
            'rules' => 'trim|integer',
            'errors' => [
                'integer' => 'Enter a valid value for Co-operative savings'
            ]
        ],
        'co_operative_dues' => [
            'rules' => 'trim|integer',
            'errors' => [
                'integer' => 'Co-operative dues must be a valid integer/float'
            ]
        ],
        'co_operative_loan' => [
            'rules' => 'trim|decimal',
            'errors' => [
                'decimal' => 'Co-operative loan figure is not valid'
            ]
        ],
        'nhf' => [
            'rules' => 'trim|required|decimal',
            'errors' => [
                'required' => 'NHF is required',
                'decimal' => 'NHF must be a valid integer/float'
            ]
        ],
        'cps' => [
            'rules' => 'trim|required|decimal',
            'errors' => [
                'required' => 'CPS is mandatory',
                'decimal' => 'A valid figure for CPS is required'
            ]
        ],
        'tax' => [
            'rules' => 'trim|required|decimal',
            'errors' => [
                'required' => 'Tax field cannot be blank',
                'decimal' => 'Tax field is not a valid integer/float value'
            ]
        ]
    ];

    /**
     * The following rules are used by the add method of the Allowances
     * Controller to create/update a staff's allowances
     * 
     * @array
     */
    public $allowance_rules = [
        'hazard' => [
            'rules' => 'trim|required|decimal',
            'errors' > [
                'required' => 'Electoral Hazard is a mandatory field',
                'decimal' => 'An invalid value was encountered'
            ]
        ],
        'responsibility' => [
            'rules' => 'trim|numeric',
            'errors' => [
                'decimal' => 'An integer/decimal was expected for responsibility allowance'
            ]
        ],
        'entertainment' => [
            'rules' => 'trim|numeric',
            'errors' => [
                'decimal' => 'An integer/decimal value was expected for entertainment'
            ]
        ],
        'drivers' => [
            'rules' => 'trim|numeric',
            'errors' => [
                'decimal' => 'An integer/decimal value was expected for drivers allowance'
            ]
        ],
    ];

     /**
     * The following rules are used by the add method of the Accounts
     * Controller to create/update a staff's allowances
     * 
     * @array
     */
    public $add_accounts_rules = [
        'bank_name' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Bank Name is missing'
            ]
        ],
        'acct_num' => [
            'rules' => 'trim|required|min_length[10]|max_length[10]',
            'errors' => [
                'required' => 'Account number is missing',
                'min_length' => 'Account number must be minimum; 10 Digits!',
                'max_length' => 'Maximum length is 10 Digits'
            ] 
        ],
        'sort_code' => [
            'rules' => 'trim|min_length[6]',
            'errors' => [
                'min_length' => 'Minimum length for sort code is 6-digits'
            ]
        ]
    ];

    /**
     * The following rules are used by the create salary method of the Staff Class
     * Controller to create a salary for a particular grade level & step
     * 
     * @array
     */
    public $create_salary = [
        'year' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Salary Year is missing'
            ]
        ],
        'annual_sal' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Annual Salary is required'
            ]
        ],
        'monthly_sal' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Monthly Salary is required'
            ]
        ],
        'hazard' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Electoral Hazard is required'
            ]
        ]
    ];


}
