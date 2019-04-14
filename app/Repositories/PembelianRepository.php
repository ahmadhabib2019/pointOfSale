<?php

namespace App\Repositories;

use App\Models\Pembelian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PembelianRepository
 * @package App\Repositories
 * @version June 6, 2018, 2:09 am UTC
 *
 * @method Pembelian findWithoutFail($id, $columns = ['*'])
 * @method Pembelian find($id, $columns = ['*'])
 * @method Pembelian first($columns = ['*'])
*/
class PembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'supplier_id',
        'pegawai_id',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pembelian::class;
    }
}
