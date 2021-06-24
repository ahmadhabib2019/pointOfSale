<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPembelian
 * @package App\Models
 * @version June 6, 2018, 2:42 am UTC
 *
 * @property integer barang_id
 * @property integer pembelian_id
 * @property integer qty
 * @property integer subtotal
 */
class DetailPembelian extends Model
{
    use SoftDeletes;

    public $table = 'detail_pembelians';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'barang_id',
        'pembelian_id',
        'harga_beli_baru',
        'qty',
        'satuan',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'barang_id' => 'integer',
        'pembelian_id' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer',
        'satuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'barang_id' => 'required',
        'pembelian_id' => 'required',
        'qty' => 'required',
        'subtotal' => 'required'
    ];
    public function barang($id)
    {
        return \App\Models\Barang::where('id',$id)->first();
    }

    public function pembelian()
    {
        return $this->belongsTo('\App\Models\Pembelian');
    }


    
}
