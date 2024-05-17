<?php

namespace App\Models;

use CodeIgniter\Model;

class StatesModel extends Model
{
    protected $table            = 'states';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'code',
        'name'
    ];

    /**
     * Get a list of all states
     * 
     * @param void
     * @return Object
     */
    public function getStates()
    {
        $builder = $this->builder();
        $query = $builder->get();

        return $query->getResult() ? $query->getResult() : NULL;
    }

    /**
     * Get the list of lgas by state
     * 
     * @param int $state_id
     * @return Object
     */
    public function getLgas($state_id)
    {
        $builder = $this->builder();

        $builder->where('states_id', $state_id);
        $query = $builder->get();

        return $query->getResult();
    }
}
