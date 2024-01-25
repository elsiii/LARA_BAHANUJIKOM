<?php

namespace App\Imports;

use App\Models\DtPengguna;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

//LOAD MODELS
use App\Models\user;
use  GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
// use App\Models\TmKategoriBarang;
//LOAD HELPER
use Tanggal;
use Konversi;

class ImportDataPenggunaClass implements ToCollection, WithCalculatedFormulas
{
    /**
     * @param Collection $rows
     * @return MsHdCashflow
     */

    public $insert;
    public  $edit;
    public  $gagal;
    public  $listgagal;

    public function __construct(){
        $this->Tanggal = new Tanggal();
        $this->Konversi = new Konversi();
    }

    public function collection(Collection $rows)
    {
        $trDt = [];
        $this->insert = 0;
        $this->edit = 0; 
        $this->gagal = 0; 
        $this->listgagal = "";

        foreach ($rows as $idx => $row) {
            if ($idx > 0) {
                //DECLARE REQUEST
                $no=isset($row[0])?($row[0]):'';
                $name=isset($row[1])?($row[1]):'';
                $email=isset($row[2])?($row[2]):'';
                $password=isset($row[3])?($row[3]):'';
                $namerole=isset($row[4])?($row[4]):'';
                 
                 
                //READY REQUEST
                $trDt[$idx]['name'] = $name;
                $trDt[$idx]['email'] = $email;
                $trDt[$idx]['password'] = $password;
                $trDt[$idx]['namerole'] = $namerole;
                

                $data = DtPengguna::where('email', '=',''.$trDt[$idx]['email'].'')->first();
                if ($data) {//UPDATE DATA
                    // $data->update_us    = auth()->user()->id;
                    $data->name         = $trDt[$idx]['name'];
                    $data->email        = $trDt[$idx]['email'];
                    $data->password     = Hash::make($trDt[$idx]['password']);
                    $data->namerole     = $trDt[$idx]['namerole'];
                    if($trDt[$idx]['namerole'] === 'administrator'){
                        $data->isrole = 1;
                    } else{
                        $data->isrole = 2; // Atur nilai "isrole" sesuai kebutuhsn
                    }
                    // SAVE THE DATA
                    if ($data->save()) {
                        // SUCCESS
                        ++$this->edit;
                    }
                } else {//INSERT DATA
                    if($trDt[$idx]['email']){
                        $data =  new DtPengguna();
                        // $data->created_us   = auth()->user()->id;
                        // $data->updated_us   = auth()->user()->id;
                    $data->name         = $trDt[$idx]['name'];
                    $data->email        = $trDt[$idx]['email'];
                    $data->password     = Hash::make($trDt[$idx]['password']);
                    $data->namerole     = $trDt[$idx]['namerole'];
                    if($trDt[$idx]['namerole'] === 'administrator'){
                        $data->isrole = 1;
                    } else{
                        $data->isrole = 2; // Atur nilai "isrole" sesuai kebutuhsn
                    }
                    
                        // $data->gc_status
                        // SAVE THE DATA
                        if ($data->save()) {
                            // SUCCESS
                            ++$this->insert;
                        }
                    }else{
                        // FAILED
                        ++$this->gagal;
                        $this->listgagal.="(".$trDt[$idx]['email']." - ".$trDt[$idx]['name']."),<br>";
                    }
                }
            }
        }
    }


}
