<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff_nominal_roll';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'file_no', 
        'staff_name',
        'gender',
        'rank',
        'grade',
        'qualification',
        'date_of_birth',
        '1st_appt',
        'state',
        'lga',
        'phone',
        'email',
        'pfa',
        'rsa',
        'date_of_retirement',
        'mode'
    ];

    /**
     * Look for staff with using name
     * 
     * @param string $name
     * @return Object
     */
    public function findByName(string $name)
    {
        $builder = $this->builder();

        $query = $builder->like('staff_name', $name)->get();
        return $query->getResult() ? $query->getResult() : NULL;
    }

    /**
     * Look for staff with using name
     * 
     * @param string $name
     * @return Object
     */
    public function findByFileNum(string $str)
    {
        $builder = $this->builder();

        $query = $builder->like('file_no', $str)->get();
        return $query->getResult() ? $query->getResult() : NULL;
    }
    /**
     * List of all staff
     * 
     * @param string $name
     * @return Object
     */
    public function listStaff()
    {
        $builder = $this->builder();

        $query = $this->builder->get();
        return $query->getResult() ? $query->getResult() : NULL;
    }
}