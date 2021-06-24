<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Harga
 * @package App\Models
 * @version May 14, 2019, 7:53 pm WIB
 *
 * @property int harga_beli
 * @property int harga_jual
 */
class Harga extends Model
{
    use SoftDeletes;

    public $table = 'hargas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'harga_beli',
        'harga_jual',
        'barang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
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

    public function barang(){
        return $this->belongsTo('App\Models\Barang');
    }
}
