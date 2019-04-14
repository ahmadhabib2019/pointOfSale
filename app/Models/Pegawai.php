<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pegawai
 * @package App\Models
 * @version May 9, 2018, 3:26 am UTC
 *
 * @property string nomor_induk
 * @property string nama
 * @property string tempat_lahir
 * @property string tanggal_lahir
 * @property string alamat
 * @property string email
 * @property string telepon
 * @property string foto
 * @property integer agama_id
 */
class Pegawai extends Model
{
    use SoftDeletes;

    public $table = 'pegawais';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'nomor_induk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'telepon',
       
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomor_induk' => 'string',
        'nama' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'string',
        'alamat' => 'string',
        'email' => 'string',
        'telepon' => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor_induk' => 'required',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'telepon' => 'required',
    ];
    public function agama(){
        return $this->belongsTo('App\Models\Agama');
    }

    public function penjualan()
        {
            return $this->hasMany('\App\Models\Penjualan');
        }      
}
