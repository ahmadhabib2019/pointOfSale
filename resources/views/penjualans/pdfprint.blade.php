<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center><h2>Rekapitulasi Penjualan  Point Of Sale</h2></center>
<table style="width: 100%">
<tr><td class="" style="text-align: right;">Tanggal : {{$date}}</td></tr>

</table><br>

<table style="width: 100%" class="table table-bordered">		
	
	<thead style="border: solid grey" >
		<tr>
			<th style="text-align: center;">No Nota</th>
			<th>Tanggal</th>
			<th>Pelanggan</th>
			<th>Pegawai</th>			
			<th style="text-align: center;">Total Beli</th>
		</tr>
	</thead><br>
	<tbody style="border: solid grey">
			<?php 
				$totall = 0 ;
			?>
		@foreach($penjualans as $penjualan)
			<?php
	        	$totall += $penjualan->total;
	    	?>
			<tr>
			<td style="text-align: center">{!! $penjualan->id !!}</td>
            <td >{!! $penjualan->created_at->format('d, M Y')!!}</td>
            <td >{!! $penjualan->pelanggan->nama !!}</td>
            <td>{!! $penjualan->pegawai->nama!!}</td>	            
            <td style="text-align: right;">Rp. {!! number_format($penjualan->total) !!}</td>
				
			</tr>
		@endforeach
		{{-- <tr></tr> --}}
		
	</tbody><br>
		<tr>
			<td>
			<b>Total Penjualan :</b></td><td><b>Rp. {!! number_format($totall) !!}				
			</td>
		</tr>
		<tr>
			<td>
			<b>Banyak Penjualan :</b></td><td><b>{!!($count) !!}			
			</td>
		</tr>
</table>
</body>
</html>
