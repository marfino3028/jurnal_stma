@extends('frontEnd.layout')

@section('content')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>
<div class="widget">
    <div class="widget-header">
        <h2>{{$judul}}</h2>
    </div>
</div>
<hr>
<div class="widget">
    <div class="widget-content">
        @foreach ($data as $item)
        @php
            $abstrak = '';
            $url = '';
            $date = '';
            $author = '';
            $count = '';
        @endphp
        <p>
         <strong>
             @if (strtolower(request()->segment(2)) === 'category')
             <a href="{{route('detail_category',$item->id)}}">
                {{$item->name}} ({{$item->catalogs->count()}})
            </a>     
             @else
             @php
                $abstrak = $item->getMetadata(2,$item->value) ? $item->getMetadata(2,$item->value)->metadata_key : '';
                $url = $item->getMetadata(3,$item->value) ? $item->getMetadata(3,$item->value)->metadata_key : '';
                $date = $item->getMetadata(4,$item->value) ? $item->getMetadata(4,$item->value)->metadata_key : '';
                $author = $item->getMetadata(5,$item->value) ? $item->getMetadata(5,$item->value)->metadata_key : '';
                $count = $item->countx($item->metadata_id,$item->metadata_key) != 1 ? '('. $item->countx($item->metadata_id,$item->metadata_key).')' : '(1)';
             @endphp
             <a href="{{route('detail_category',$item->id)}}">
                {{$item->metadata_key}} {{ $count }}
            </a>     
             @endif
            
        </strong><br>   
        @if ($item)
        @if (strtolower(request()->segment(2)) === 'title')
        <p>
            <small>
                @if ($author != '' || $date != '')
                    {{ $author }} | {{ $date }}
                @endif
            </small><br>
                {{ Str::limit( $abstrak ,200)}}    
        </p> 
        @endif   
        @endif
    </p>
    @endforeach
</div>
</div>
<hr>
@endsection