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
		<h4>DATA PENGGUNA</h4>
		<p>Waktu Export : {{date('d-m-Y H:i')}}</p>
	</center>
 
	<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th> 
			<th>Nama</th>
			<th>Email</th> 
			<th>Hak Akses</th> 
			<th>Waktu Input</th> 
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
                {{-- <td><img width="100px" height="60px" class="rounded-5" src="@if($dt->img) {{asset('')}}images/user/{{$dt->img}} @else {{asset('')}}images/no-user.png @endif" style="object-fit:cover"> </td> --}}
                <td>{{$dt->name??''}}</td>
                <td>{{$dt->email??''}}</td>
                <td>{{$dt->namerole??''}}</td>
                <td>{{isset($dt->created_at)?$Tanggal->inddatetime($dt->created_at??'',' '):''}}</td>
			</tr>
		@endforeach
		@endif
		</tbody>
	</table>
 
</body>
</html>