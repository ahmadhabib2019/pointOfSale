<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version May 30, 2018, 5:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualans
 * @property \Illuminate\Database\Eloquent\Collection penjualans
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property integer level
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'level' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     public function penjualan()
    {
        return $this->hasMany('\App\Models\Penjualan');
    }
    public function returs()
    {
        return $this->hasMany('\App\Models\Retur');
    }
    public function pembelian()
    {
        return $this->hasMany('\App\Models\Pembelian');
    }
}
