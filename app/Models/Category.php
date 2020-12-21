<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version September 8, 2020, 2:50 am UTC
 *
 * @property string $name
 * @property string $description
 */
class Category extends Model
{
    // use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];


    public function katalog_metadata(){
        return $this->hasMany(\App\Models\KatalogMetadata::class);
    }

    public function catalogs(){
        return $this->hasMany(\App\Models\Catalog::class);
    }
}
