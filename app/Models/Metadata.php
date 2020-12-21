<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Metadata
 * @package App\Models
 * @version September 8, 2020, 4:01 am UTC
 *
 * @property string $key
 * @property string $value
 */
class Metadata extends Model
{
    // use SoftDeletes;

    public $table = 'metadata';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'key',
        'value',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string',
        'type' =>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required',
        'value' => 'required',
        'type'=>'required'
    ];

    public function katalog_metadata(){
        return $this->hasMany(\App\Models\KatalogMetadata::class);
    }    
}
