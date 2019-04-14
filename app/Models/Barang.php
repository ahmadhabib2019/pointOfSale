<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * @package App\Models
 * @version May 1, 2018, 9:35 pm UTC
 *
 * @property string kode
 * @property string nama
 * @property string keterangan
 * @property integer stok
 * @property integer harga
 * @property integer kategori_id
 */
class Barang extends Model
{
    use SoftDeletes;

    public $table = 'barangs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'keterangan',
        'stok',
        'harga_beli',
        'harga_jual',
        'kategori_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode' => 'string',
        'nama' => 'string',
        'keterangan' => 'string',
        'stok' => 'integer',
        'harga_beli' => 'integer',
        'harga_jual' => 'integer',
        'kategori_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'stok' => 'required',
        'harga_jual' => 'required'
    ];

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori');
    }
    public function detail_penjualan()
    {
        return $this->belongsTo('App\Models\DetailPenjualan');
    }
    public function getKodeNamaAttribute()
    {
        return $this->kode . ' ' . $this->nama;
    }    
    
}
