<?php

namespace App\Repositories;

use App\Models\Bills;
use App\Repositories\BaseRepository;

/**
 * Class BillsRepository
 * @package App\Repositories
 * @version July 17, 2019, 4:49 pm UTC
*/

class BillsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'created_at'
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
        return Bills::class;
    }
}
