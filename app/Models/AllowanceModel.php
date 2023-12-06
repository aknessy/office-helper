<?php

namespace App\Models;

use CodeIgniter\Model;

class AllowanceModel extends Model
{
    protected $table = 'staff_allowances';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nominal_roll_id',
        'hazard',
        'responsibility',
        'entertainment',
        'drivers',
        'date',
        'created_at',
        'updated_at'
    ];
 

    /**
     * Calculate the total earnings for the staff with the given $staff_id/nominal_roll_id
     * 
     * @param int $staff_id
     * @param int $month
     * @param int $year
     * 
     * @return Mixed
     */
    public function total_allowances(int $staff_id, int $year = 2023)
    {
        $total = 0;

        $query = $this->builder->
            select('hazard, responsibility, entertainment, drivers')
            ->where(['nominal_roll_id' => $staff_id, 'YEAR(date)' => $year])
            ->get();
            
        if($query->getResult()) 
        {  
            foreach($query->getResult() as $row){
                $total += $row->hazard + $row->responsibility + $row->entertainment + $row->drivers;
            }
        }

        return $total;
    }
}