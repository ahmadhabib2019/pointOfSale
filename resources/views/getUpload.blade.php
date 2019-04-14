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
		@foreach($results as $result)
			<tr>
				<td>{{$result->id}}</td>
				<td>{{$result->nama}}</td>
				<td>{{$result->stok}}</td>
				<td>{{$result->harga_beli}}</td>
				<td>{{$result->harga_jual}}</td>
				<td>{{$result->kategori->nama}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>
