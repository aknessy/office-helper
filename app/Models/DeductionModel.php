<?php

namespace App\Models;

use CodeIgniter\Model;

class DeductionModel extends Model
{
    protected $table = 'staff_deductions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nominal_roll_id',
        'welfare',
        'co_operative',
        'co_operative_dues',
        'loan',
        'nhf',
        'tax',
        'cps',
        'misc',
        'year'
    ];

    /**
     * Calculate total deductions for the staff with the given id
     * 
     * @param int $staff_id
     * @param int 2023
     * @return Mixed
     */
    public function total_deductions(int $staff_id, $year = 2023)
    {
        $total = 0;
        $builder = $this->builder();
        
        $query = $builder->
            select('welfare, co_operative, co_operative_dues, loan, nhf, tax, cps')
            ->where(['nominal_roll_id' => $staff_id, 'YEAR(date)' => $year])
            ->get();
            
        if($query->getResult()) 
        {  
            foreach($query->getResult() as $row){
                $total += (NULL == $row->welfare ? 0 : $row->welfare)
                     + (NULL == $row->co_operative ? 0 : $row->co_operative)
                     + (NULL == $row->co_operative_dues ? 0 : $row->co_operative_dues)
                     + (NULL == $row->loan ? 0 : $row->loan)
                     + (NULL == $row->nhf ? 0 : $row->nhf)
                     + (NULL == $row->tax ? 0 : $row->tax)
                     + (NULL == $row->cps ? 0 : $row->cps);
            }
        }

        return $total;
    }
}