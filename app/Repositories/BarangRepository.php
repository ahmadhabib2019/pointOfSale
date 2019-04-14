<?php

namespace App\Repositories;

use App\Models\Barang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BarangRepository
 * @package App\Repositories
 * @version May 1, 2018, 9:35 pm UTC
 *
 * @method Barang findWithoutFail($id, $columns = ['*'])
 * @method Barang find($id, $columns = ['*'])
 * @method Barang first($columns = ['*'])
*/
class BarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'keterangan',
        'stok',
        'harga_beli',
        'harga_jual',
        'kategori_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Barang::class;
    }
}
