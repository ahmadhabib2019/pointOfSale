<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agama
 * @package App\Models
 * @version May 9, 2018, 2:28 am UTC
 *
 * @property string nama
 */
class Agama extends Model
{
    use SoftDeletes;

    public $table = 'harga_barangs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'harga_beli',
        'harga_jual'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'harga_beli' => 'integer',
        'harga_jual' = >'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'harga_beli' => 'required',
        'harga_jual' => 'required'
    ];
         
}
