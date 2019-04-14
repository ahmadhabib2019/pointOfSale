<div class="row">
    <div class="col-md-4 col-sm-4">
    <h4>Kios Bunga Zahra Garden</h4>
    <address>
        <p>Ponpes Biharu Bahri Asali Fadla'ailirrahmah</p>
        <p>Alamat :Sananrejo, Kec.Turen, Kab.Malang</p>
        <p>Kode Pos: 65175</p>
    </address>
    </div>
    <div class="col-md-4 col-sm-4">        
        <p><b>Penjualan</b></p>
        <p><b>Waktu   : </b>{{$penjualan->created_at}}</p>
        <p><b>Pegawai :</b> {{$penjualan->pegawai->nama}} </p>
        <p><b>No.Nota :</b> {{$penjualan->id}} </p>
         
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Pelanggan</h4>
        <p>Nama : {{$penjualan->pelanggan->nama}}</p>
        <p>Alamat : {{$penjualan->pelanggan->alamat}}</p>
        <p>Telp : {{$penjualan->pelanggan->telp}}</p>
        <p>Email :{{$penjualan->pelanggan->email}}</p>
    </div>
</div>
<tr style="border-top: 2px solid black"></tr>
<div class="row">
    <div class="col-md-10">
    <h3>Detail Penjualan</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-1">Qty</th>
            <th class="col-md-2">Sub Total</th>
        </tr>
        @foreach ($penjualan->detail_penjualan as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barang_id)->kode}}</td>
                <td>{{$item->barang($item->barang_id)->nama}}</td>
                <td class="text-right">{{$item->qty}}</td>
                <td class="text-right">{{$item->subtotal}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-right">Total</td>
            <td class="text-right">{{$penjualan->total}}</td>
        </tr>
    </table>
</div>
</div>
</div>