<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pembelian
 * @package App\Models
 * @version June 6, 2018, 2:09 am UTC
 *
 * @property date tanggal
 * @property 	integer supplier_id
 * @property 	integer pegawai_id
 * @property integer total
 */
class Pembelian extends Model
{
    use SoftDeletes;

    public $table = 'pembelians';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal',
        'supplier_id',
        'pegawai_id',
        'user_id',
        'nota',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'supplier_id' => 'required',
        'pegawai_id' => 'required',
        'total' => 'required'
    ];
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function supplier()
    {
        return $this->belongsTo('\App\Models\Supplier');
    }
     public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai');
    }
    public function detail_pembelian(){
        return $this->hasMany('\App\Models\DetailPembelian');
    }
}