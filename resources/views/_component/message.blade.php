@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!!session('success')!!}</strong>
</div>
@endif
@if(session()->has('info'))
<div class="alert alert-info" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!!session('info')!!}</strong>
</div>
@endif
@if(session()->has('failed'))
<div class="alert alert-warning" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!!session('failed')!!}</strong>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger mg-b-0" role="alert">
    <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!!session('error')!!}</strong>
</div>
@endif