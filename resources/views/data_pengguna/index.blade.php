@extends('template_back.content')
@section('title', 'Data Pengguna')
@section('content')

@php 
$Tanggal = new \App\Helpers\Tanggal; //panggil no static function
$Konversi = new \App\Helpers\Konversi; //panggil no static function
@endphp
<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Data Pengguna</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item text-white active">Data Pengguna</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                

                <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Data Pengguna</p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex my-auto btn-list justify-content-end">
                                <a href="{{route('data_pengguna.input')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                                 <button onclick="formImport()" class="btn btn-sm btn-secondary"><i class="fa fa-upload me-2"></i> Import</button>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fa fa-download me-2"></i>Export
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="exportExcel()">Excel</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="exportPdf()">PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- message info -->
                    @include('_component.message')
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label mt-2 mb-0">Hak Akses</label> 
                            <select id="f1" class="form-control select2" onchange="reload_table()">
                                <option value="">=== semua ===</option>
                                <option value="1" @if(request()->get('f1')==1) selected @endif>administrator</option>
                                <option value="2" @if(request()->get('f1')==2) selected @endif>operator</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th width="20px">Foto</th>
                                    <th width="180px">Nama</th>
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th>Waktu Input</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($data as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><img width="100px" height="60px" class="rounded-5" src="@if($dt->img) {{asset('')}}images/user/{{$dt->img}} @else {{asset('')}}images/no-user.png @endif" style="object-fit:cover"> </td>
                                    <td>{{$dt->name??''}}</td>
                                    <td>{{$dt->email??''}}</td>
                                    <td>{{$dt->namerole??''}}</td>
                                    <td>{{isset($dt->created_at)?$Tanggal->inddatetime($dt->created_at??'',' '):''}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_pengguna.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('data_pengguna.edit', $dt->id) }}" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal effects -->
    <div class="modal fade effect-scale" id="mdl_formImport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="area_formImport" role="document">
            <div class="modal-content modal-content-demo">
            <form id="formImport" action="{{ route('data_pengguna.import_excel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Import Data</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
                                <span class="alert-inner--text"><strong>Catatan!</strong><br> sistem akan mereplace data jika menginputkan kode yang sama dengan data yang sudah tersimpan di aplikasi.</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Format Import </label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <a href="{{asset('')}}format_databarang.xlsx" class="btn btn-sm btn-secondary" download><i class="fa fa-download me-2"></i> Download Format Excel Import</a>
                                </div>
                            </div>
                            <div class="row row-xs align-items-top mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Upload Excel <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control mb-1" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required >
                                    <small class="text-muted">format .csv .xls .xlsx</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="float-right btn btn-primary pd-x-30 mg-r-5 mg-t-5"><i class='fa fa-save'></i> Simpan</button>
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

</div>
<!-- /container -->


<script>
    $(function() {
        // formelement
        $('.select2').select2({ width: 'resolve' });
        
        // init datatable.
        $('#tbl_list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });
    
    function reload_table(){
        var f1 =  $('#f1').val();	
        window.location.href="data_pengguna?f1="+f1;
    }
    function formImport() {
        $("#formImport")[0].reset();
        $("#mdl_formImport").modal('show');
    }
    function exportExcel() {
        var f1 =  $('#f1').val();
        var s = $('.whatever').val();		
        window.open(
        "data_pengguna/export_excel?s="+s+"&f1="+f1,
            '_blank' // <- This is what makes it open in a new window.
        );
    }
    function exportPdf() {
        var f1 =  $('#f1').val();
        var s = $('.whatever').val();		
        window.open(
        "data_pengguna/export_pdf?s="+s+"&f1="+f1,
            '_blank' // <- This is what makes it open in a new window.
        );
    }
</script>

    



@endsection