<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kategori
 * @package App\Models
 * @version May 1, 2018, 7:55 pm UTC
 *
 * @property string nama
 * @property string keterangan
 */
class Kategori extends Model
{
    use SoftDeletes;

    public $table = 'kategoris';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

  public function barang(){
        return $this->hasMany('App\Models\Barang');
    }    
}
