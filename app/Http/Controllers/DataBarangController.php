<?php

namespace App\Http\Controllers;

//LOAD MODEL
use App\Models\DtBarang;
use App\Models\User;
//PACKAGE BAWAAN
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use Validator;
//LOAD PACKAGE EXCEL
use App\Imports\ImportDataBarangClass;
use App\Exports\DataBarangExportView;
use Excel;
//LOAD PACKAGE PDF
use PDF;

//LOAD HELPER
use Tanggal;
use Konversi;

class DataBarangController extends Controller
{
    public function __construct(){
        $this->Tanggal = new Tanggal();
        $this->Konversi = new Konversi();
    }
    public function index(Request $request)
    {
        $f1=$request->input('f1');
        $data = DtBarang::select('*');
        if($f1){
            $data->where('kategori_id','=',''.$f1.'')->get();
        }
        $data = $data->get();
        return view('data_barang.index',['data'=>$data]);
    }


    public function input(Request $request)
    {
        return view('data_barang.formInput');
    }

    public function create(Request $request)
    {
        $isrole=auth()->user()->isrole;
        //DECLARE REQUEST
        $kode = $request->input('kode');
        $nama = $request->input('nama');
        $kategori_id = $request->input('kategori_id');
        $harga_satuan = $request->input('harga_satuan');
        $harga_jual = $request->input('harga_jual');
        $satuan = $request->input('satuan');
        $tgl_produksi = $request->input('tgl_produksi');
        $tgl_expired = $request->input('tgl_expired');
        $deskripsi = $request->input('deskripsi');
        $status = $request->input('status');
        $img = $request->file('img');

        //COSTUM REQUEST
        if($tgl_produksi){
            $tgl_produksi=$this->Tanggal->tanggalDatabase($tgl_produksi);
        }else{
            $tgl_produksi=null;
        }
        if($tgl_expired){
            $tgl_expired=$this->Tanggal->tanggalDatabase($tgl_expired);
        }else{
            $tgl_expired=null;
        }
        if($harga_satuan){
            $harga_satuan=$this->Konversi->numberonly($harga_satuan);
        }else{
            $harga_satuan=null;
        }
        if($harga_satuan){
            $harga_jual=$this->Konversi->numberonly($harga_jual);
        }else{
            $harga_jual=null;
        }

        //VALIDATION FORM
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:15|unique:dt_barang,kode',
            'nama' => 'nullable|max:255',
            'kategori_id' => 'nullable|max:5|numeric',
            'tgl_produksi' => 'date_format:d/m/Y',
            'tgl_expired' => 'date_format:d/m/Y',
            'harga_satuan' => 'nullable|max:20',
            'harga_jual' => 'nullable|max:20',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        if ($validator->fails()) {
            $errormessage='';
            foreach ($validator->errors()->all() as $message) {
                $errormessage.='<li>'.$message.'</li>';
            }
            //NOT VALID
            return back()
            ->with('failed','Harap periksa kembali!. <ul>'.$errormessage.'</ul>')->withInput();
        }

        if (isset($img)) {
            $imageName = ''.date('YmdHis').'-'.uniqid().'.'.$img->getClientOriginalExtension();
            $destinationPath = 'images/barang/';
            //CEK FILE IN FOLDER
            if (File::exists(public_path($destinationPath.$imageName))) {
                File::delete(public_path($destinationPath.$imageName));
            }
            // UPLOAD TO THE DESTINATION PATH ($dir_path) IN PUBLIC FOLDER
            $img->move($destinationPath, $imageName);
        } else {
            $imageName = null;
        }

        try {
            $data =  new DtBarang();
            $data->created_us   = auth()->user()->id;
            $data->updated_us   = auth()->user()->id;
            $data->kode         = $kode;
            $data->nama         = $nama;
            $data->kategori_id  = $kategori_id;
            $data->harga_satuan = $harga_satuan;
            $data->harga_jual   = $harga_jual;
            $data->satuan       = $satuan;
            $data->tgl_produksi = $tgl_produksi;
            $data->tgl_expired  = $tgl_expired;
            $data->img          = $imageName;
            $data->deskripsi    = $deskripsi;
            $data->status       = $status;
            // SAVE THE DATA
            if ($data->save()) {
                // SUCCESS
                return redirect()
                ->route('data_barang.edit',['id' => $data->id])
                ->with('success', 'Data berhasil disimpan');
            }
		}
		catch(Exception $e){
            //ERROR
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}
    }
    
    public function edit($id)
    {
        // GET THE DATA BASED ON ID
        $data = DtBarang::find($id);
        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', 'item not found!');
        }
        return view('data_barang.formEdit', compact('data','id'));
    }


    public function update($id, Request $request)
    {
        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('data_barang')
                ->with('error', 'item not found!');
        }
        $isrole=auth()->user()->isrole;
        
        //DECLARE REQUEST
        $kode = $request->input('kode');
        $nama = $request->input('nama');
        $kategori_id = $request->input('kategori_id');
        $harga_satuan = $request->input('harga_satuan');
        $harga_jual = $request->input('harga_jual');
        $satuan = $request->input('satuan');
        $tgl_produksi = $request->input('tgl_produksi');
        $tgl_expired = $request->input('tgl_expired');
        $deskripsi = $request->input('deskripsi');
        $status = $request->input('status');
        $img = $request->file('img');

        //COSTUM REQUEST
        if($tgl_produksi){
            $tgl_produksi=$this->Tanggal->tanggalDatabase($tgl_produksi);
        }else{
            $tgl_produksi=null;
        }
        if($tgl_expired){
            $tgl_expired=$this->Tanggal->tanggalDatabase($tgl_expired);
        }else{
            $tgl_expired=null;
        }
        if($harga_satuan){
            $harga_satuan=$this->Konversi->numberonly($harga_satuan);
        }else{
            $harga_satuan=null;
        }
        if($harga_satuan){
            $harga_jual=$this->Konversi->numberonly($harga_jual);
        }else{
            $harga_jual=null;
        }
   
        // GET THE DATA BASED ON ID
        $data = DtBarang::find($id);
        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', 'item not found!');
        }
        $img_b=$data->img??null;
        $id_b=$data->id??'';

        //VALIDATION FORM
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:15|unique:dt_barang,kode,'.$id_b,
            'nama' => 'nullable|max:255',
            'kategori_id' => 'nullable|max:5|numeric',
            'tgl_produksi' => 'date_format:d/m/Y',
            'tgl_expired' => 'date_format:d/m/Y',
            'harga_satuan' => 'nullable|max:20',
            'harga_jual' => 'nullable|max:20',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        if ($validator->fails()) {
            $errormessage='';
            foreach ($validator->errors()->all() as $message) {
                $errormessage.='<li>'.$message.'</li>';
            }
            //NOT VALID
            return back()
            ->withInput()
            ->with('failed','Harap periksa kembali!. <ul>'.$errormessage.'</ul>');
        }

        if (isset($img)) {
            $imageName = ''.date('YmdHis').'-'.uniqid().'.'.$img->getClientOriginalExtension();
            $destinationPath = 'images/barang/';
            //CEK FILE IN FOLDER
            if (File::exists(public_path($destinationPath.$img_b))) {
                File::delete(public_path($destinationPath.$img_b));
            }
            // UPLOAD TO THE DESTINATION PATH ($dir_path) IN PUBLIC FOLDER
            $img->move($destinationPath, $imageName);
        } else {
            $imageName = $img_b;
        }

        try {
            $data->updated_us   = auth()->user()->id;
            $data->kode         = $kode;
            $data->nama         = $nama;
            $data->kategori_id  = $kategori_id;
            $data->harga_satuan = $harga_satuan;
            $data->harga_jual   = $harga_jual;
            $data->satuan       = $satuan;
            $data->tgl_produksi = $tgl_produksi;
            $data->tgl_expired  = $tgl_expired;
            $data->img          = $imageName;
            $data->deskripsi    = $deskripsi;
            $data->status       = $status;
            // SAVE THE DATA
            if ($data->save()) {
                // SUCCESS
                return redirect()
                ->route('data_barang.edit',['id' => $data->id])
                ->with('success', 'Data berhasil disimpan');
            }
		}
		catch(Exception $e){
            // ERROR
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}
    }


    public function destroy($id)
    {
        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('data_barang')
                ->with('error', 'item not found!');
        }

        $db = DtBarang::where('id', $id);
        $cek = $db->count();
        $data = $db->first();
        $file_b = $data->img??'';
        try {
            if ($cek) {
                if ($file_b) {
                    $destinationPath = 'images/barang/';
                    if (File::exists(public_path($destinationPath.$file_b))) {
                        File::delete(public_path($destinationPath.$file_b));
                    }
                }
                $db->delete();
            }
            // SUCCESS
            return redirect()
            ->route('data_barang')
            ->with('success', 'Data berhasil dihapus');
        }
        catch(Exception $e){
            // ERROR
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}
    }


    public function import_excel(Request $request)
    {
        //DECLARE REQUEST
        $file = $request->file('file');

        //VALIDATION FORM
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            if($file){
                // IMPORT DATA
                $import = new ImportDataBarangClass;
                Excel::import($import, $file);
                
                // SUCCESS
                $notimportlist="";
                if ($import->listgagal) {
                    $notimportlist.="<hr> Not Register : <br> {$import->listgagal}";
                }
                return redirect()
                ->route('data_barang')
                ->with('success', 'Import Data berhasil,<br>
                Size '.$file->getSize().', File extention '.$file->extension().',
                Insert '.$import->insert.' data, Update '.$import->edit.' data,
                Failed '.$import->gagal.' data, <br> '.$notimportlist.'');

            } else {
                // ERROR
                return back()
                ->withInput()
                ->with('error','Gagal memproses!');
            }
            
		}
		catch(Exception $e){
			// ERROR
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}

    }

    public function export_excel(Request $request)
    {
        //DECLARE REQUEST
        $f1=$request->input('f1');
        //QUERY
        $data = DtBarang::select('*');
        if($f1){
            $data->where('kategori_id','=',''.$f1.'')->get();
        }
        $data = $data->get();

        // Pass parameters to the export class
        $export = new DataBarangExportView($data);
        
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_barang';
        
        // Download the Excel file
        return Excel::download($export, $filename . '.xlsx');
    }

     public function export_pdf(Request $request)
    {
        //DECLARE REQUEST
        $f1=$request->input('f1');
        //QUERY
        $data = DtBarang::select('*');
        if($f1){
            $data->where('kategori_id','=',''.$f1.'')->get();
        }
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('data_barang.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_barang';
        // Download the Pdf file
        return $pdf->download($filename.'.pdf');
    }

    
}