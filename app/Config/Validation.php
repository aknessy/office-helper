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

    /**
     * The following rules are used by the add staff record method of the Staff Class
     * Controller to add a record to the staff nominal roll
     * 
     * @array
     */
    public $add_staff_record = [
        'title' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Title field is required'
            ]
        ],
        'fname' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'First name is required'
            ]
        ],
        'lname' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Lastname is required'
            ]
        ],
        'gender' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Gender is required'
            ]
        ],
        'rank' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Rank/Designation is required'
            ]
        ],
        'grade_level' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Grade Level is required'
            ]
        ],
        'step' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Step is required'
            ]
        ],
        'qualification' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Enter at least one qualification'
            ]
        ],
        'cadre' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Staff Cadre is required'
            ]
        ],
        'date_of_birth' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Date of birth'
            ]
        ],
        'first_appt' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'First Appointment is required'
            ]
        ],
        'state_of_origin' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'State of Origin is required',
                'integer' => 'State must be an Integer'
            ]
        ],
        'lga_of_origin' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'LGA of origin is required',
                'integer' => 'LGA of origin must be an Integer'
            ]
        ],
        'phone' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Phone number is required'
            ]
        ],
        'pfa' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Pension Fund Administrator is required',
            ]
        ],
        'rsa_pin' => [
            'rules' => 'trim|required|min_length[15]',
            'errors' => [
                'required' => 'RSA PIN is required',
                'min_length[15]' => 'Ensure the RSA PIN is correct'
            ]
        ],
        'i_certify' => [
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'Checkbox to ensure the information provided is correct to the best of your knowledge, must be checked',
            ]
        ],
    ];

    /**
     * The following rules are used by the add staff service record method of the Staff Class
     * Controller to add a record of service (promotion) for a staff
     * 
     * @array
     */
    public $add_prom_record = [
        'rank' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'The new rank must be selected'
            ]
        ],
        'effective_date_of_prom' => [
            'rules' => 'trim|required|valid_date[Y-m-d]',
            'errors' => [
                'required' => 'Effective date for promotion is missing',
                'valid_date' => 'Date is invalid'
            ]
        ],
        'grade_level' => [
            'rules' => 'trim|required|greater_than[0]',
            'errors' => [
                'required' => 'Grade level promoted to is required',
                'greater_than' => 'Grade level must be greater than 0'
            ]
        ],
        'step' => [
            'rules' => 'trim|required|greater_than[0]',
            'errors' => [
                'required' => 'Step promoted to is required',
                'greater_than' => 'Step must be greater than 0'
            ]
        ],
        'type_of_promotion' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Type of promotion is required'
            ]
        ]
    ];

    public $add_posting_record = [
        'effective_date' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Effective date of posting is required'
            ]
        ],
        'state_of_posting' => [
            'rules' => 'trim|required|integer|greater_than[0]',
            'errors' => [
                'required' => 'State of posting is required',
                'integer' => 'State is invalid',
                'greater_than[0]' => 'Lga is invalid'
            ]
        ],
        'lga' => [
            'rules' => 'trim|required|integer|greater_than[0]',
            'errors' => [
                'required' => 'Lga of posting is required',
                'integer' => 'Lga is invalid',
                'greater_than[0]' => 'Lga is invalid'
            ]
        ],
        'remark' => [
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Please add a remark'
            ]
        ]
    ];


}
