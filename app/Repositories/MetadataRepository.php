<?php

namespace App\Repositories;

use App\Models\Metadata;
use App\Repositories\BaseRepository;

/**
 * Class MetadataRepository
 * @package App\Repositories
 * @version September 8, 2020, 4:01 am UTC
*/

class MetadataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value'
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
        return Metadata::class;
    }
}
