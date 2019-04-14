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
        <h4>Pembelian</h4>
        <p>{{$pembelian->created_at}}</p>
        <p>Pegawai : {{$pembelian->pegawai->nama}} </p>
        <p>No.Nota : {{$pembelian->id}} </p>
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>supplier</h4>
        <p>Nama : {{$pembelian->supplier->nama}}</p>
        <p>Alamat : {{$pembelian->supplier->alamat}}</p>
        <p>Telp : {{$pembelian->supplier->telp}}</p>
        {{-- <p>Email :{{$pembelian->supplier->email}}</p> --}}
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10">
    <h3>Detail Pembelian</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-3">Harga</th>
            <th class="col-md-1">Qty</th>
            <th class="col-md-2">Sub Total</th>
        </tr>
        @foreach ($pembelian->detail_pembelian as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barang_id)->kode}}</td>
                <td>{{$item->barang($item->barang_id)->nama}}</td>
                <td>{{$item->barang($item->barang_id)->harga_beli}}</td>
                <td class="text-right">{{$item->qty}}</td>
                <td class="text-right">{{$item->subtotal}}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="5" class="text-right">Total</th>
            <td class="text-right">{{$pembelian->total}}</td>
        </tr>
    </table>
</div>
</div>