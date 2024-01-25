<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Konversi {
	function uang($angka){
		$hasil_rupiah = number_format($angka,0,'',',');
		return $hasil_rupiah;
	}
	function numberonly($angka){
		return (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
	}
	
}