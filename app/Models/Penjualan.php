<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penjualan
 * @package App\Models
 * @version May 16, 2018, 4:19 am UTC
 *
 * @property integer tanggal
 * @property integer pelanggan_id
 * @property integer pegawai_id
 * @property integer total
 */
class Penjualan extends Model
{
    use SoftDeletes;

    public $table = 'penjualans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal',
        'pelanggan_id',
        'pegawai_id',
        'user_id',
        'total',
        'diskon',
        'bayar',
        'kembalian'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
        'pelanggan_id' => 'integer',
        'user_id' => 'integer',      
        'total' => 'integer'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'pelanggan_id' => 'required',
        'pegawai_id' => 'required',        
        'total' => 'required'
    ];

    public function pelanggan()
    {
        return $this->belongsTo('\App\Models\Pelanggan');
    }
     public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai');
    }
    public function detail_penjualan(){
        return $this->hasMany('\App\Models\DetailPenjualan');
    }
    // public function detailpenjualan(){
    //     return $this->belongsTo('\App\Models\DetailPenjualan');
    // }
}
