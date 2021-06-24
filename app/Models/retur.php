<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class retur
 * @package App\Models
 * @version April 27, 2019, 8:29 am WIB
 *
 * @property string tanggal
 * @property string total
 */
class retur extends Model
{
    use SoftDeletes;

    public $table = 'returs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'supplier_id',
        'pegawai_id',
        'user_id',
        'tanggal',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
        'total' => 'string',
        'supplier_id' => 'integer',
        'pegawai_id'=>'integer',
        'user_id'=>'integer',
        'tanggal'=>'date',
        'total'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'total' => 'required'
    ];
    public function supplier()
    {
        return $this->belongsTo('\App\Models\Supplier');
    }
    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai');
    }
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function detail_retur()
    {
        return $this->hasMany('\App\Models\DetailRetur');    
    }
}
