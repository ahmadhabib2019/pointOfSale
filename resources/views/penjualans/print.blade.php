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
<body style="text-align: center; height: 100%; font-size: 5pt; margin-left: 0%">
	<div class="layout" style="width: 100%">
		<table>
            <tr>                
                <td class="" style="font-size: 8px;">
                    <center>
                        <b> Point Of Sale</b><br>
                		<h>PP Bibaafadlrah</h>
                        <h>Sananrejo, Kec.Turen, Kab.Malang</h>
                        <h style="font-size: 6px">Kode Pos: 65175</h>
                    </center>
                </td>            
            </tr>
        </table>
        <table style="width: 100%">
            <tr style="width: 100%">
    			<td style="font-size: 6px" class="text-left">
    				<h><b>Penjualan</b></h><br>
    				<h><b>Tanggal :</b> {{$penjualan->created_at->format('d, M Y')}}</h><br>
                    <h><b>Pegawai :</b> {{$penjualan->user->name}}</h><br>
                    <h><b>No.Nota :</b> {{$penjualan->id}} </h>
    			</td>
    			<td style="font-size: 6px" class="text-right">
                    <h><b>Pelanggan</b></h><br>
    				<h><b>Nama 	: </b>{{$penjualan->pelanggan->nama}}</h><br>
    				<h><b>Alamat 	: </b>{{$penjualan->pelanggan->alamat}}</h><br>
    				<h><b>No Telp 	:</b> {{$penjualan->pelanggan->telepon}}</h>
    			</td>
    		</tr>
    	</table>
    </div>

        <h style="font-size: 7px"><b>Daftar Barang </b></h>
    <table class="table" style="border: 1px solid black; width: 100%;">
        <tr>
            <th class="col-sm-1 ">No</th>
            <th class="col-md-2 text-center">Kode Barang</th>
            <th class="col-md-3 text-center">Nama Barang</th>
            <th class="col-md-3 text-center">Harga Barang</th>
            <th class="col-md-1 text-center">Qty</th>
            <th class="col-md-2 text-center">Subtotal</th>
        </tr>
        @foreach ($penjualan->detail_penjualan as $row=>$item)
            <tr >
                <td style="font-size: 7px;border-top: 1 solid black ">{{$row + 1 }}</td>
                <td style="font-size: 6px;border-top: 1 solid black ">{{$item->barang($item->barang_id)->kode}}</td>
                <td style="font-size: 6px;border-top: 1 solid black ">{{$item->barang($item->barang_id)->nama}}</td>
                <td style="font-size: 6px;border-top: 1 solid black ">Rp. {{number_format($item->barang($item->barang_id)->harga_jual)}}</td>
                <td style="font-size: 7px;border-top: 1 solid black "class="text-right">{{$item->qty}}</td>
                <td style="font-size: 6px;border-top: 1 solid black "class="text-right">Rp. {{number_format($item->subtotal)}}</td>
            </tr>
        @endforeach

        <tr style="border-top: 2px solid black;">
            <td ></td><td></td><td></td>
            <td style="font-size: 7px;border-top: 1 solid black"colspan="" class="text-left"><b>Total : </b></td>
            <td style="font-size: 7px;border-top: 1 solid black;"colspan="2" class=""><b>Rp. {{number_format($penjualan->total)}}</b></td>
        </tr>
        <tr>
           <td colspan="2" style="border-top: 1 solid black "><b>Jumlah Tunai</td>
            <td class="text-right" style="border-top: 1 solid black "><b>Rp. {{number_format($penjualan->bayar)}}</td>
            <td style=""></td>
            <td style=""></td>            
        </tr>        
        <tr>
            <td colspan="2"><b>kembalian</td>
            <td class="text-right"><b>Rp. {{number_format($penjualan->kembalian)}}</td>
        </tr>
    </table>
    <br>
    <footer style="text-align: center;">
    	<p><b>~~ Terima Kasih dan Selamat Berbelanja kembali. ~~</b></p>
    </footer>
</body>
</html>