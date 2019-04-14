<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
        'kode'=> $row['kode'],
        'nama'=> $row['nama'],
        'keterangan'=> $row['keterangan'],
        'stok'=> $row['stok'],
        'harga_beli'=> $row['harga_beli'],
        'harga_jual'=> $row['harga_jual'],
        'kategori_id'=> $row['kategori_id'],
        ]);     
    }
}
