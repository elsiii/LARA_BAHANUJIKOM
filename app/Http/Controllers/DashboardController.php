<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//LOAD MODEL
use App\Models\DtBarang;
use App\Models\TmKategoriBarang;
use App\Models\User;


class DashboardController extends Controller
{

    public function index(Request $request)
	{
        $total_user = User::count();
        $total_barang = DtBarang::count();
        $total_kategoribarang = TmKategoriBarang::count();
        $total_expired = DtBarang::select('*')->whereRaw('SUBSTR(tgl_expired,1,4)<=YEAR(CURDATE())')->count();
        #GRAFIK A -------------------------------------------------------------------------------------
        //MANUAL QUERY
        //$queryA=DB::select('SELECT tm_kategoribarang.nama, COUNT(dt_barang.id) as total FROM dt_barang RIGHT JOIN tm_kategoribarang ON dt_barang.kategori_id = tm_kategoribarang.id GROUP BY tm_kategoribarang.nama');
        //ELOQUENT BUILDER QUERY
        $queryA=DtBarang::selectRaw('tm_kategoribarang.nama, COUNT(dt_barang.id) as total')
        ->rightJoin('tm_kategoribarang', 'dt_barang.kategori_id', '=', 'tm_kategoribarang.id')
        ->groupBy('tm_kategoribarang.nama')
        ->get();
        $dataGrafikA='';
        foreach($queryA as $gr){
            $nama = $gr->nama??'';
            $total = $gr->total??0;
            $dataGrafikA .= "{ name: '{$nama}', y: {$total} },";
        }
        #GRAFIK B -------------------------------------------------------------------------------------
         //MANUAL QUERY
        $queryB=DB::select("SELECT
                CASE
                    WHEN harga_jual BETWEEN 0 AND 5000 THEN '0 - 5.000'
                    WHEN harga_jual BETWEEN 5001 AND 10000 THEN '5.001 - 10.000'
                    WHEN harga_jual BETWEEN 10001 AND 50000 THEN '10.001 - 50.000'
                    ELSE '50.001+'
                END AS range_harga,
                COUNT(*) AS total
            FROM
                dt_barang
            GROUP BY
                range_harga
            ORDER BY
                MIN(harga_jual)");
        $dataGrafikB='';
        foreach($queryB as $gr){
            $nama = $gr->range_harga??'';
            $total = $gr->total??0;
            $dataGrafikB .= "{ name: '{$nama}', y: {$total} },";
        }
        #GRAFIK C -------------------------------------------------------------------------------------
        $GrafikC = "";
        for($i=1;$i<=12;$i++){
            $queryC=DtBarang::select('*')->whereRaw('MONTH(created_at)='.$i.'')->count();
            $GrafikC .= "{$queryC},";
        }
        $dataGrafikC=rtrim($GrafikC, ',');
        

        return view('dashboard.index',[
            'total_user' => $total_user,
            'total_barang' => $total_barang,
            'total_kategoribarang' => $total_kategoribarang,
            'total_expired' => $total_expired,
            'dataGrafikA' => $dataGrafikA,
            'dataGrafikB' => $dataGrafikB,
            'dataGrafikC' => $dataGrafikC,
        ]);
	}

}
