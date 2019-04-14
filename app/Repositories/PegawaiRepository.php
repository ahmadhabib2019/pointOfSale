<?php

namespace App\Repositories;

use App\Models\Pegawai;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PegawaiRepository
 * @package App\Repositories
 * @version May 9, 2018, 3:26 am UTC
 *
 * @method Pegawai findWithoutFail($id, $columns = ['*'])
 * @method Pegawai find($id, $columns = ['*'])
 * @method Pegawai first($columns = ['*'])
*/
class PegawaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor_induk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'telepon',
        'foto',
        'agama_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pegawai::class;
    }
}
