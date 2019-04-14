<?php

namespace App\Repositories;

use App\Models\Kategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KategoriRepository
 * @package App\Repositories
 * @version May 1, 2018, 7:55 pm UTC
 *
 * @method Kategori findWithoutFail($id, $columns = ['*'])
 * @method Kategori find($id, $columns = ['*'])
 * @method Kategori first($columns = ['*'])
*/
class KategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kategori::class;
    }
}
