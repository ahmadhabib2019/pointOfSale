<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript">
			function rupiah($item){
				$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
				return $hasil_rupiah;
 			}
		</script>
	</head>
<body style="text-align: center; height: 100%; font-size: 7pt; margin-left: 5%">
	<div class="layout" style="width: 100%">
		<table style="width: 100%">
            <tr>
                <!-- <td style="width: 230px; height: 130px">
                    <img src="{{asset('images/aj.png')}}" style="width: 80%; height: 100%">
                </td> -->
                <td class="" style="font-size: 12px;">
                    <b>KIOS BUNGA ZAHRA GARDEN</b>
            		<p>Ponpes Biharu Bahri Asali Fadla'ailirrahmah</p>
                    <p>Alamat :Sananrejo, Kec.Turen, Kab.Malang</p>
                    <p>Kode Pos: 65175</p>
                </td>            
    			<td >
    				<p><b>Penjualan</b></p>
    				<p><b>Waktu   :</b>{{$penjualan->created_at}}</p>
                    <p><b>Pegawai :</b> {{$penjualan->pegawai->nama}}</p>
                    <p><b>No.Nota :</b> {{$penjualan->id}} </p>
    			</td>
    			<td>
                    <p><b>Pelanggan</b></p>
    				<p><b>Nama 	: </b>{{$penjualan->pelanggan->nama}}</p>
    				<p><b>Alamat 	: </b>{{$penjualan->pelanggan->alamat}}</p>
    				<p><b>No Telp 	:</b> {{$penjualan->pelanggan->telepon}}</p>
    			</td>
		</tr>
	</table>
    </div>

        <h5><b>Daftar Struk Penjualan</b></h5>
    <table class="table" style="border: 0px solid black; width: 100%;">
        <tr>
            <th class="col-md-1 text-center">No</th>
            <th class="col-md-2 text-center">Kode Barang</th>
            <th class="col-md-3 text-center">Nama Barang</th>
            <th class="col-md-1 text-center">Qty</th>
            <th class="col-md-2 text-center">Subtotal</th>
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
        <tr style="border-top: 2px solid black;">
            <td></td><td></td><td></td><td>
            <td class="text-left"><b>Total : </b></td>
            <td class="text-right"><b>{{$penjualan->total}}</b></td>
        </tr>
        <tr>
            <td></td><td></td><td></td><td></td>
            <td  class="text-left" style="border-top: 2px solid black;">Diskon Total : </td>
            <td class="text-right" style="border-top: 2px solid black;">{{$penjualan->diskon}}</td>
        </tr>
        {{-- <tr>
            <td></td><td></td>
            <!-- <td class="text-left"><b>Jenis Pembayaran : {{$penjualan->jenisbayar}}</b></td> -->
            <td></td>
            <td  class="text-left" style="border-top: 2px solid black;"><b>Total Bayar: </b></td>
            <!-- <td style="border-top: 2px solid black;" class="text-right"><b>{{$penjualan->totalbersih}}</b></td> -->
        </tr> --}}
        <tr>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Jumlah Tunai :</b></td>
            <!-- <td style="border-top: 2px solid black;" class="text-right"><b>{{$penjualan->JUMLAH_BAYAR}} --></b></td>
            <td></td>
            <td class="text-left" style="border-top: 2px solid black;"><b>Kembalian : </b></td>
            <!-- <td style="border-top: 2px solid black;" class="text-right"><b>{{$penjualan->KEMBALIAN}}</b></td> -->
        </tr>
    </table>
    <br>
    <footer style="text-align: center;">
    	<p><b>~~ Terima Kasih dan Selamat Berbelanja kembali. ~~</b></p>
    </footer>
</body>
</html>