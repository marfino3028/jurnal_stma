<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Catalog
 * @package App\Models
 * @version September 8, 2020, 8:37 am UTC
 *
 * @property \App\Models\Category $category
 * @property \App\Models\User $user
 * @property string $cover
 * @property string $full
 * @property integer $user_id
 * @property integer $category_id
 */
class Catalog extends Model
{
    // use SoftDeletes;

    public $table = 'catalogs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cover',
        'full',
        'user_id',
        'category_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cover' => 'string',
        'full' => 'string',
        'user_id' => 'integer',
        'category_id' => 'integer',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cover' => 'required|mimes:doc,pdf,docx,zip|max:10000"',
        'full' => 'required|mimes:doc,pdf,docx,zip|max:50000"',
        'user_id' => 'required',
        'category_id' => 'required',
    ];

    public static $update_rules = [
        'cover' => 'nullable|mimes:doc,pdf,docx,zip|max:10000"',
        'full' => 'nullable|mimes:doc,pdf,docx,zip|max:50000"',
        'user_id' => 'required',
        'category_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function katalog(){
        return $this->hasMany(\App\Models\CatalogMetadataValue::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function catalog_metadata_value(){
        return $this->hasMany(\App\Models\CatalogMetadataValue::class);
    }
}
