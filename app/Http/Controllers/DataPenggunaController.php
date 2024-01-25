<?php

namespace App\Http\Controllers;

//LOAD MODEL
use App\Models\DtPengguna;
use App\Models\User;
//PACKAGE BAWAAN
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
//LOAD PACKAGE EXCEL
use App\Imports\ImportDataPenggunaClass;
use App\Exports\DataPenggunaExportView;
use Excel;
//LOAD PACKAGE PDF
use PDF;

//LOAD HELPER
use Tanggal;



class DataPenggunaController extends Controller
{
    public function __construct(){
        $this->Tanggal = new Tanggal();
    }
    public function index(Request $request)
    {
        $f1=$request->input('f1');
        $data = DtPengguna::select('*');
        if($f1){
            $data->where('isrole','=',''.$f1.'')->get();
        }
        $data = $data->get();
        return view('data_pengguna.index',['data'=>$data]);
    }

    
    public function input(Request $request)
    {
        return view("data_pengguna.formInput");
    }


    public function create(Request $request)
    {
        $isrole=auth()->user()->isrole;
        //DECLARE REQUEST
        $namerole = $request->input('namerole');
        $hakakses = $request->input('isrole');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $img = $request->file('img');
        
        //COSTUM REQUEST
        // $namerole = null;

        //VALIDATION FORM
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // 'isrole' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:80|min:8',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        if ($validator->fails()) {
            $errormessage='';
            foreach ($validator->errors()->all() as $message) {
                $errormessage.='<li>'.$message.'</li>';
            }
            return back()
            ->with('failed','Harap periksa kembali inputan!. <ul>'.$errormessage.'</ul>')->withInput();
        }
 
        if (isset($img)) {
            $imageName = ''.date('YmdHis').'-'.uniqid().'.'.$img->getClientOriginalExtension();
            $destinationPath = 'images/user/';
            //CEK FILE IN FOLDER
            if (File::exists(public_path($destinationPath.$imageName))) {
                File::delete(public_path($destinationPath.$imageName));
            }
            // UPLOAD TO THE DESTINATION PATH ($dir_path) IN PUBLIC FOLDER
            $img->move($destinationPath, $imageName);
            $post['img'] = $imageName;
        } else {
            $post['img'] = null;
        }

        try {
            $post['name'] = $name;
            $post['email_verified_at'] = now();
            $post['password'] = Hash::make($password);
            $post['remember_token'] = Str::random(10);
            $post['isrole'] = $isrole;
            $post['namerole'] = $namerole;
            $post['email'] = $email;
			$after = DtPengguna::create($post);
            $data  = DtPengguna::where('id','=',$after->id)->first();
            return redirect()
            ->route('data_pengguna', ['id' => $data->id])
            ->with('success', 'Data berhasil disimpan');
		}
		catch(Exception $e){
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}
    }
    
    public function edit($id)
    {
        // GET THE DATA BASED ON ID
        $data = DtPengguna::find($id);
        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', 'item not found!');
        }
        return view('data_pengguna.formEdit', compact('data','id'));
    }


    public function update($id,Request $request)
    {
        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('data_pengguna')
                ->with('error', 'item not found!');
        }
        $isrole=auth()->user()->isrole;
        //DECLARE REQUEST
        $namerole = $request->input('namerole');
        $hakakses = $request->input('isrole');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $img = $request->file('img');
        
        //COSTUM REQUEST
        // $namerole = null;


        // GET THE DATA BASED ON ID
        $data = DtPengguna::find($id);
        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', 'item not found!');
        }
        $img_b=$old->img??null;
        $id_b=$old->id??'';

        //VALIDATION FORM
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            // 'isrole' => 'required|numeric',
            'email' => 'required|email|unique:users,email'.$id_b,
            'password' => 'nullable|max:80|min:8',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        if ($validator->fails()) {
            $errormessage='';
            foreach ($validator->errors()->all() as $message) {
                $errormessage.='<li>'.$message.'</li>';
            }
            return back()
            ->with('failed','Harap periksa kembali inputan!. <ul>'.$errormessage.'</ul>')->withInput();
        }

        if (isset($img)) {
            $imageName = ''.date('YmdHis').'-'.uniqid().'.'.$img->getClientOriginalExtension();
            $destinationPath = 'images/user/';
            //CEK FILE IN FOLDER
            if (File::exists(public_path($destinationPath.$img_b))) {
                File::delete(public_path($destinationPath.$img_b));
            }
            // UPLOAD TO THE DESTINATION PATH ($dir_path) IN PUBLIC FOLDER
            $img->move($destinationPath, $imageName);
            $post['img'] = $imageName;
        } else {
            $post['img'] = $img_b;
        }


        try {
            if($password){
                $post['password'] = Hash::make($password);
            }
            //$post['email_verified_at'] = now();
            $post['name'] = $name;
            $post['email'] = $email;
            // $post['remember_token'] = Str::random(10);
            DtPengguna::where('id', $id)->update($post);
            return redirect()
            ->route('data_pengguna.edit', ['id' => $id])
            ->with('success', 'Data berhasil disimpan');
		}
		catch(Exception $e){
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
                ->route('data_pengguna')
                ->with('error', 'item not found!');
        }

        $db = DtPengguna::where('id', $id);
        $cek = $db->count();
        $data = $db->first();
        $file_b = $data->img??'';
        try {
            if ($cek) {
                if ($file_b) {
                    $destinationPath = 'images/user/';
                    if (File::exists(public_path($destinationPath.$file_b))) {
                        File::delete(public_path($destinationPath.$file_b));
                    }
                }
                $db->delete();
            }
            // SUCCESS
            return redirect()
            ->route('data_pengguna')
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
                $import = new ImportDataPenggunaClass;
                Excel::import($import, $file);
                
                // SUCCESS
                $notimportlist="";
                if ($import->listgagal) {
                    $notimportlist.="<hr> Not Register : <br> {$import->listgagal}";
                }
                return redirect()
                ->route('data_pengguna')
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
        $data = DtPengguna::select('*');
        if($f1){
            $data->where('kategori_id','=',''.$f1.'')->get();
        }
        $data = $data->get();

        // Pass parameters to the export class
        $export = new DataPenggunaExportView($data);
        
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_pengguna';
        
        // Download the Excel file
        return Excel::download($export, $filename . '.xlsx');
    }

     public function export_pdf(Request $request)
    {
        //DECLARE REQUEST
        $f1=$request->input('f1');
        //QUERY
        $data = DtPengguna::select('*');
        if($f1){
            $data->where('kategori_id','=',''.$f1.'')->get();
        }
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('data_pengguna.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_pengguna`';
        // Download the Pdf file
        return $pdf->download($filename.'.pdf');
    }
   
}