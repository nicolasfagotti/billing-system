<?php

namespace App\Repositories;

use App\Models\Concepts;
use App\Repositories\BaseRepository;

/**
 * Class ConceptsRepository
 * @package App\Repositories
 * @version September 12, 2019, 10:01 pm UTC
*/

class ConceptsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Concepts::class;
    }
}
