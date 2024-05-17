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
        'uid',
        'file_no', 
        'staff_name',
        'gender',
        'marital_status',
        'rank',
        'grade_level',
        'step',
        'qualification',
        'cadre',
        'date_of_birth',
        'first_appt',
        'confirmation',
        'state_of_origin',
        'lga_of_origin',
        'phone',
        'email',
        'pfa',
        'rsa_pin',
        'date_of_ret',
        'mode_of_ret',
        'photo',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted',
        'deleted_by',
        'deleted_at'
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
     * Look for staff with using their unique identifier
     * 
     * @param string $uid
     * @return Object
     */
    public function findByUID(string $uid)
    {
        $builder = $this->builder();
        $query = $this->builder->getWhere(['uid' => $uid]);
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

    /**
     * Update the nominal roll table by inserting the photo
     * 
     * @param string $uid
     * @param array $options
     * @return bool
     */
    public function updateStaff($uid, $options)
    {
        $builder = $this->builder();
        $builder->update($options, ['uid' => strtoupper($uid)]);
    }

}