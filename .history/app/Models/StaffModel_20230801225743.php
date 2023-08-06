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
        'rsa'

    ];
}