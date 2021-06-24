    @extends('layouts.app')

@section('content')
<section class="content-header">
  <h class="" style="font-size: 30px"><b>Laba Rugi</b> </h>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
<table class="table table-responsive" id="barangs-table" style="height: 0px">
    <thead>
        <tr>
{{--         <th>ID</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga jual</th>
        <th>Kategori</th>         --}}
        </tr>
    </thead>
    <tbody>
        {{-- dd($barang,$detailPenjualan,$penjualan,$pegawai,$pelanggan); --}}
        @foreach($barang as $baranss)
        <tr>
        <td>{{ $baranss->nama }}</td>
        <td>{{ $baranss->stok }}</td>
        {{-- <td>{{ $detail->qty }}</td> --}}
        {{-- <td>{{ $laporandate->stok }}</td> --}}
        {{-- <td>{{ $laporandate->kategori->nama }}</td> --}}
        </tr>
        @endforeach
    </tbody>

</table>
        </div>
    </div>
</div>
@endsection


