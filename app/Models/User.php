<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * Class User
 * @package App\Models
 * @version October 13, 2019, 5:54 am UTC
 *
 * @property \App\Models\Role role
 * @property string name
 * @property string username
 * @property integer role_id
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class User extends Authenticatable implements MustVerifyEmail
{
    // use SoftDeletes;
    use Notifiable;


    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'username',
        'role_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'username' => 'string',
        'role_id' => 'integer',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'username' => 'required',
        'role_id' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ];

    public static $update_rules = [
        'name' => 'required',
        'username' => 'required',
        'role_id' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'nullable|min:6|confirmed',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

  
}
