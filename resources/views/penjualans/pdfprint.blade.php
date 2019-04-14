<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center><h2>Data Penjualan Kios Bunga Zahra Garden</h2></center>
		<script type="text/javascript">
			function rupiah($item){
				$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
				return $hasil_rupiah;
 			}
		</script>
<table border="" style="width: 100%">		
	<thead>
		<tr>
			<th>No Nota</th>
			<th>Tanggal</th>
			<th>Banyak Barang</th>
			<th>Total Beli</th>
			<th>Pelanggan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($penjualans as $penjualan)
			<tr>
				<td>{{$penjualan->id}}</td>
				<td>{{$penjualan->tanggal}}</td>
				{{-- <td>{{$item->qty}}</td> --}}
				<td>{{$penjualan->total}}</td>
				<td>{{$penjualan->pelanggan->nama}}</td>
				
			</tr>
		@endforeach
	</tbody>
</table>
{{-- <br></br>
<h2>KATEGORI</h2>
<table border="1" style="width: 500px">
	
	<thead>
		<tr>KATEGORI
			<th>ID</th>
			<th>Nama</th>
			<th>Stok</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($kategoris as $kategori)
			<tr>
				<td>{{$kategori->id}}</td>
				<td>{{$kategori->nama}}</td>
				<td>{{$kategori->keterangan}}</td>				
			</tr>
		@endforeach
	</tbody>
</table> --}}
</body>
</html>
