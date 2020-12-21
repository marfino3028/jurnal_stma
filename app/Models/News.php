<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class News extends Model
{
    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'judul',
        'deskripsi',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_news' => 'integer',
        'judul' =>'string',
        'deskripsi' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' =>'required',
        'deskripsi' => 'required',
        'img' => 'required'
    ];
    public static $update_rules = [
        'judul' =>'required',
        'deskripsi' => 'required',
        'img' => 'required'
    ];

}
