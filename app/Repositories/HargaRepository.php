<?php

namespace App\Repositories;

use App\Models\Harga;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HargaRepository
 * @package App\Repositories
 * @version May 14, 2019, 7:53 pm WIB
 *
 * @method Harga findWithoutFail($id, $columns = ['*'])
 * @method Harga find($id, $columns = ['*'])
 * @method Harga first($columns = ['*'])
*/
class HargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'harga_beli',
        'harga_jual'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Harga::class;
    }
}
