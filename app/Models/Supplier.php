<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version June 6, 2018, 1:48 am UTC
 *
 * @property string nama
 * @property string alamat
 * @property string telepone
 * @property string email
 * @property string keterangan
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'alamat',
        'telepone',
        'email',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'alamat' => 'string',
        'telepone' => 'string',
        'email' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'telepone' => 'required',
        'email' => 'required',
        'keterangan' => 'required'
    ];
    public function pembelian()
    {
        return $this->hasMany('\App\Models\Pembelian');
    }       
    public function retur()
    {
    return $this->hasMany('\App\Models\retur');
    }
}
