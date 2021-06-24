<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPenjualan
 * @package App\Models
 * @version May 23, 2018, 6:34 pm UTC
 *
 * @property integer barang_id
 * @property integer penjualan_id
 * @property integer qty
 * @property integer subtotal
 */
class DetailRetur extends Model
{
    use SoftDeletes;

    public $table = 'detail_returs';    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'barang_id',
        'retur_id',
        'qty',
        'subtotal',
        'status'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'=>'integer',
        'retur_id' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    public function retur()
    {
        return $this->belongsTo('\App\Models\retur');
    }
    public function barang($id)
    {    
        return \App\Models\Barang::where('id',$id)->first();
    }
}