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
        <h4>Data Retur</h4>
        <p><b>Tanggal Pengembalian : </b>{{$retur->created_at->format('d, M Y')}}</p>
        <p><b>Pegawai :</b> {{$retur->user->name}} </p>
        <p><b>No.Nota :</b> {{$retur->id}} </p>
         
    </div>
    <div class="col-md-4 col-sm-4">
        <h4>Supplier</h4>
        <p>Nama : {{$retur->supplier->nama}}</p>
        <p>Alamat : {{$retur->supplier->alamat}}</p>
        <p>Telp : {{$retur->supplier->telp}}</p>
        {{-- <p>Email :{{$retur->supplier->email}}</p> --}}
    </div>
</div>
<tr style="border-top: 2px solid black"></tr>
<div class="row">
    <div class="col-md-10">
    <h3>Detail Data Retur</h3>
    <table class="table table-bordered">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-1">Kode</th>
            <th class="col-md-3">Nama</th>
            <th class="col-md-2">Status Barang</th>
            <th class="col-md-2">Harga</th>
            <th class="col-md-1">Jumlah Yang di Kembalikan</th>
            <th class="col-md-2">Sub Total</th>
        </tr>
        @foreach ($retur->detail_retur as $row=>$item)
            <tr>
                <td>{{$row + 1 }}</td>
                <td>{{$item->barang($item->barang_id)->kode}}</td>
                <td>{{$item->barang($item->barang_id)->nama}}</td>          
                <td class="">{{$item->status}}</td>
                <td>Rp. {{number_format($item->barang($item->barang_id)->harga_jual)}}</td>
                <td class="text-right">{{$item->qty}}</td>
                <td class="text-right">Rp. {{number_format($item->subtotal)}}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td colspan="4" class="text-right"><b>Total</td>
            <td colspan="2" class="text-right"><b>Rp. {{number_format($retur->total)}}</td>
        </td>        
    </table>
</div>
</div>
</div>
