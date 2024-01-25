@php
$Konversi = new \App\Helpers\Konversi; //panggil no static function
$Tanggal = new \App\Helpers\Tanggal; //panggil no static function

@endphp
<table>
    <tbody>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">DATA BARANG</td>
        </tr>
        <tr>
            <td colspan="9" style="font-weight:bold;text-align:center">Waktu Export : {{date('d-m-Y H:i')}}</td>
        </tr>
    </tbody>
</table>
<table>
    <thead>
    <tr>
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">No</th> <!-- kolom A -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Kode</th> <!-- kolom B -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Nama</th> <!-- kolom C -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Kategori</th> <!-- kolom D -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Harga Satuan</th> <!-- kolom E -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Harga Jual</th> <!-- kolom F -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Satuan</th> <!-- kolom G -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Tanggal Produksi</th> <!-- kolom H -->
        <th style="font-weight:bold;text-align:center;background:#f4f4f4;border:1px solid #000000;">Tanggal Expired</th> <!-- kolom I -->
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