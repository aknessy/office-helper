<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountingModel extends Model
{
    protected $table = 'staff_accounts';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'bank_name',
        'acct_num',
        'bank_code',
        'gross_salary',
        'welfare',
        'co_operative',
        'co_operative_dues',
        'lo'
    ];
}