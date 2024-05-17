<?php

namespace App\Models;

use CodeIgniter\Model;

class StatesLgasModel extends Model
{
    protected $table            = 'states_lgas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'names',
        'states_id'
    ];

    /**
     * Get a list of all LGAs for the state with the given id
     * 
     * @param void
     * @return Object
     */
    public function getLgas($state_id)
    {
        $builder = $this->builder();

        $this->builder->where('states_id', $state_id);
        $query = $builder->get();

        return $query->getResult() ? $query->getResult() : NULL;
    }
}
