<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CatalogMetadataValue
 * @package App\Models
 * @version September 8, 2020, 2:14 pm UTC
 *
 * @property \App\Models\Catalog $catalog
 * @property \App\Models\Metadata $metadata
 * @property integer $catalog_id
 * @property integer $metadata_id
 * @property string $value
 */
class CatalogMetadataValue extends Model
{
    use SoftDeletes;

    public $table = 'catalog_metadata_value';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'catalog_id',
        'metadata_id',
        'metadata_key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'catalog_id' => 'integer',
        'metadata_id' => 'integer',
        'metadata_key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'catalog_id' => 'required',
        'metadata_id' => 'required',
        'metadata_key' => 'required',
        'value' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catalog()
    {
        return $this->belongsTo(\App\Models\Catalog::class, 'catalog_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function metadata()
    {
        return $this->belongsTo(\App\Models\Metadata::class, 'metadata_id');
    }

    public function countx($metadata_id,$metadata_key)
    {
        return $this->where('metadata_id',$metadata_id)->where('metadata_key',$metadata_key)->count();
    }

    public function getUser(){
        return $this->join('catalogs', 'catalog_metadata_value.catalog_id', '=', 'catalogs.id')
                    ->join('users', 'catalogs.user_id', '=', 'users.id')
                    ->select('catalog_metadata_value.*', 'users.name')
                    ->first();
    }

    public function getMetadata($metadata,$value){
        return $this->join('metadata', 'catalog_metadata_value.metadata_id', '=', 'metadata.id')
                    ->select('catalog_metadata_value.*','metadata_key')
                    ->where('catalog_metadata_value.value',$value)
                    ->where('key',$metadata)
                    ->first();
    }

    public function getWithCatalogs($category_id){
        return $this->join('catalogs', 'catalog_metadata_value.catalog_id', '=', 'catalogs.id')
                    ->where('category_id',$category_id)
                    ->groupBy('value')
                    ->select('catalog_metadata_value.*', 'catalogs.cover', 'catalogs.full','catalogs.status','catalogs.status','catalogs.user_id');
    }
    
    
}
