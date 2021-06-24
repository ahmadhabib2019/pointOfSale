<?php

namespace App\Repositories;

use App\Models\retur;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class returRepository
 * @package App\Repositories
 * @version April 27, 2019, 8:29 am WIB
 *
 * @method retur findWithoutFail($id, $columns = ['*'])
 * @method retur find($id, $columns = ['*'])
 * @method retur first($columns = ['*'])
*/
class returRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return retur::class;
    }
}
