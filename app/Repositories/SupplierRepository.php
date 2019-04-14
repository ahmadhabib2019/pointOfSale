<?php

namespace App\Repositories;

use App\Models\Supplier;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupplierRepository
 * @package App\Repositories
 * @version June 6, 2018, 1:48 am UTC
 *
 * @method Supplier findWithoutFail($id, $columns = ['*'])
 * @method Supplier find($id, $columns = ['*'])
 * @method Supplier first($columns = ['*'])
*/
class SupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'telepone',
        'email',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supplier::class;
    }
}
