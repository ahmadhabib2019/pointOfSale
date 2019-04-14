<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>BARANG COBA dulullll</h2>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Stok</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Kategori</th>
		</tr>
	</thead>
	<tbody>
		@foreach($barangs as $barang)
			<tr>
				<td>{{$barang->id}}</td>
				<td>{{$barang->nama}}</td>
				<td>{{$barang->stok}}</td>
				<td>{{$barang->harga_beli}}</td>
				<td>{{$barang->harga_jual}}</td>
				<td>{{$barang->kategori->nama}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>
