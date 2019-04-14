<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pelanggan
 * @package App\Models
 * @version May 9, 2018, 2:56 am UTC
 *
 * @property string nama
 * @property string alamat
 * @property string telepon
 * @property string email
 */
class Pelanggan extends Model
{
    use SoftDeletes;

    public $table = 'pelanggans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'alamat' => 'string',
        'telepon' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'email' => 'required'
    ];

public function penjualan(){
        return $this->hasMany('\App\Models\Penjualan');
    }       
}
