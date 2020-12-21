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
        <h2>Repository STMA TRISAKTI</h2>
    </div>
    <div class="widget-content">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis quod maiores ipsum non excepturi voluptate incidunt. Asperiores nam quibusdam id natus aliquid sunt, corporis, perspiciatis quasi nobis accusantium obcaecati amet!</p>
    </div>
</div>
<hr>
<div class="widget">
    <div class="widget-header">
        <h3>Main Collection</h3>
    </div>
    <div class="widget-content">
        @foreach ($categories as $item)
        <p>
         <strong>
            <a href="{{route('detail_category',$item->id)}}">
                {{$item->name}} ({{$item->catalogs->count()}})
            </a>
        </strong><br>
        <em>{{$item->description}}</em>
    </p>
    @endforeach
</div>
</div>
<hr>
<div class="widget">
    <div class="widget-header">
        <h3>Recently Added</h3>
    </div>
    <div class="widget-content" id="test-data">
        <?php $no =1;?>
        @foreach ($recents as $key)
        <p>
            {{-- @foreach ($item['catalog_metadata_value'] as $row) --}}
            <strong>
                @if ($key->metadata_key=='title')
                <a href="{{route('detail_catalog',$item->id)}}">
                    Judul  {{$no++}}
                </a>
                @endif
            </strong><br>
            <p>
               <small>
                admin | 15 September 2020 <br>
            </small>
            {!!  Str::limit($key->value,200) !!}
            <hr>
        </p>
    </p>
    {{-- @endforeach --}}
    @endforeach
</div>
<div class="widget-footer pull-right">
    {{ $recents->links() }}
</div>
</div>
@endsection