<?php

namespace App\Models;

use CodeIgniter\Model;

class SalaryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'staff_salary';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'grade',
        'step',
        'annual_consolidated_salary',
        'monthly_consolidated_salary',
        'hazard',
        'responsibility',
        'entertainment',
        'drivers',
        'created_at',
        'updated_at',
        'year'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Look for a staff's salary using staff grade level & step
     * 
     * @param $grade
     * @param $step
     * @return Object
     */
    public function findSalaryByGrade(int $grade, int $step = 0, $year = 2023)
    {
        $builder = $this->builder();
        
        if($step == 0 || $step < 1)
            $query = $builder->getWhere(['grade' => $grade, 'year' => $year]);
        else
            $query = $builder->getWhere(['grade' => $grade, 'step' => $step, 'year' => $year]);

        return $query->getResult() ? $query->getResult() : NULL;
    }
}
