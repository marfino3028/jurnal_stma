@extends('frontEnd.layout')

@section('content')
<div class="widget">
    <div class="widget-header">
        <h3>
        {{-- {{ get_metadata_value($catalog['catalog_metadata_value'],'title') }} --}}
        </h3>
        <span>
        <h2>{{ $judulx->cover }}</h2>
        </span>
        <div class="widget-content">
            @foreach ($data as $key)
            <p>
                <strong>
                    <a href="{{route('detail.val',['id'=>$key['id'], 'val'=>$key['value']])}}">
                        {{ $key['judul'] }}
                    </a>
                </strong><br>
                <p>
                    <small>
                        {{ $key['author']}} | {{date('d M Y')}}
                    </small><br>
                    {{ Str::limit($key['abstrak'],200)}}
                </p>
            </p>
            <hr>
            @endforeach
        </div>
    
    </div>
    
   
</div>    
@endsection