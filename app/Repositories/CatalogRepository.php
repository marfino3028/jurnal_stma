<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Repositories\BaseRepository;

/**
 * Class CatalogRepository
 * @package App\Repositories
 * @version September 8, 2020, 8:37 am UTC
*/

class CatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cover',
        'full',
        'user_id',
        'category_id'
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
        return Catalog::class;
    }
}
