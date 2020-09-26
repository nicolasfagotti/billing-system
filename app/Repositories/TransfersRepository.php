<?php

namespace App\Repositories;

use App\Models\Transfers;
use App\Repositories\BaseRepository;

/**
 * Class TransfersRepository
 * @package App\Repositories
 * @version September 26, 2020, 10:54 pm UTC
*/

class TransfersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'amount',
        'bank_id',
        'bill_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transfers::class;
    }
}
