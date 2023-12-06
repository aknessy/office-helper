<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountingModel extends Model
{
    protected $table = 'staff_accounts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nominal_roll_id',
        'bank_name',
        'account_num',
        'bank_code',
        'sort_code',
    ];

    /**
     * Get all distinct Bank names and the codes from db
     * 
     * @param array $data
     * @param array $where
     * 
     * @return bool
     */
    public function bank_names_codes()
    {
        $query = $this->builder->select('bank_name, bank_code')
                ->groupBy('bank_code')
                ->get();

        return $query->getResult();
    }
}