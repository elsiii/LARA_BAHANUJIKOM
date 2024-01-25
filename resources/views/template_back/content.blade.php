@extends('template_back.layout')

@section('content')
        @if(isset($konten))
    
                {{ view($konten) }}
        
        @else
    
                {{'File Konten Tidak Ada'}}
    
        @endif
@endsection
