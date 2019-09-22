<?php

namespace App\Repositories;

use App\Models\Checks;
use App\Repositories\BaseRepository;

/**
 * Class ChecksRepository
 * @package App\Repositories
 * @version September 22, 2019, 7:14 am UTC
*/

class ChecksRepository extends BaseRepository
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
        return Checks::class;
    }
}
