@php
$Konversi = new \App\Helpers\Konversi; //panggil no static function
$Tanggal = new \App\Helpers\Tanggal; //panggil no static function
@endphp
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pengguna</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		table tr th{
			font-weight:bold;
			text-align:center;
			background:#f4f4f4;
		}
	</style>
	<center>
		<h4>DATA BARANG</h4>
		<p>Waktu Export : {{date('d-m-Y H:i')}}</p>
	</center>
 
	<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th> 
			<th>Nama</th>
			<th>Kategori</th> 
			<th>Harga Satuan</th> 
			<th>Harga Jual</th> 
			<th>Satuan</th>
			<th>Tanggal Produksi</th> 
			<th>Tanggal Expired</th>
		</tr>
		</thead>
		<tbody>
		@php $no=1; @endphp
		@if(count($data))
		@foreach($data as $dt)
			@php 
			$dbKategori=DB::table('tm_kategoribarang')->select('*')->where('id','=',$dt->kategori_id)->first();
			@endphp
			<tr>
				<td>{{$no++}}</td>
				<td>{{$dt->kode??''}}</td>
				<td>{{$dt->nama??''}}</td>
				<td>{{$dbKategori->nama??''}}</td>
				<td>{{isset($dt->harga_satuan)?$Konversi->uang($dt->harga_satuan??''):''}}</td>
				<td>{{isset($dt->harga_jual)?$Konversi->uang($dt->harga_jual??''):''}}</td>
				<td>{{$dt->satuan??''}}</td>
				<td>{{isset($dt->tgl_produksi)?$Tanggal->ind($dt->tgl_produksi??'','/'):''}}</td>
				<td>{{isset($dt->tgl_expired)?$Tanggal->ind($dt->tgl_expired??'','/'):''}}</td>
			</tr>
		@endforeach
		@endif
		</tbody>
	</table>
 
</body>
</html>