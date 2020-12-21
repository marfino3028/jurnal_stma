<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KatalogMetadata
 * @package App\Models
 * @version September 8, 2020, 7:20 am UTC
 *
 * @property \App\Models\Category $category
 * @property \App\Models\Metadata $metadata
 * @property integer $category_id
 * @property integer $metadata_id
 * @property integer $type
 */
class KatalogMetadata extends Model
{
    // use SoftDeletes;

    public $table = 'katalog_metadata';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'metadata_id',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'metadata_id' => 'integer',
        'type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'category_id' => 'required',
        // 'metadata_id' => 'required',
        // 'type' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function metadata()
    {
        return $this->belongsTo(\App\Models\Metadata::class, 'metadata_id');
    }
}
