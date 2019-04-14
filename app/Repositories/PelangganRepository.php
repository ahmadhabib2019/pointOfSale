<?php

namespace App\Repositories;

use App\Models\Pelanggan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PelangganRepository
 * @package App\Repositories
 * @version May 9, 2018, 2:56 am UTC
 *
 * @method Pelanggan findWithoutFail($id, $columns = ['*'])
 * @method Pelanggan find($id, $columns = ['*'])
 * @method Pelanggan first($columns = ['*'])
*/
class PelangganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'telepon',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pelanggan::class;
    }
}
