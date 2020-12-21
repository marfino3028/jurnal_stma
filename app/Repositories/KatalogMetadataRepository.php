<?php

namespace App\Repositories;

use App\Models\KatalogMetadata;
use App\Repositories\BaseRepository;

/**
 * Class KatalogMetadataRepository
 * @package App\Repositories
 * @version September 8, 2020, 7:20 am UTC
*/

class KatalogMetadataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'metadata_id',
        'type'
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
        return KatalogMetadata::class;
    }
}
