<?php

namespace App\Repositories;

use App\Models\CatalogMetadataValue;
use App\Repositories\BaseRepository;

/**
 * Class CatalogMetadataValueRepository
 * @package App\Repositories
 * @version September 8, 2020, 2:14 pm UTC
*/

class CatalogMetadataValueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'catalog_id',
        'metadata_id',
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
        return CatalogMetadataValue::class;
    }
}
