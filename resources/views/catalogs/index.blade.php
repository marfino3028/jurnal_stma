@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Catalog Categories</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">Catalogs</li>
     </ol>
    </small>
</div>
<div class="box-body row">
    @include('flash::message')
    <div class="alert "><h3>Pilih Kategori</h3></div>
    @foreach ($categories as $item)
        <div class="col-sm-4" >
            <div class="box p-a" style="background-color:#EFF0F2;border-radius:5px;min-height:200px;">
                <div class="box-header">{{ $item->name }}</div>
                <div class="box-body" style="position: absolute;bottom:10px">
                    <a class="btn btn-fw primary" href="{!! route('catalogs.index_with_category',$item->id) !!}">
                        <i class="fa fa-table "></i> List
                    </a>
                    <a class="btn btn-fw primary" href="{!! route('catalogs.create_with_category',$item->id) !!}">
                        <i class="fa fa-plus-square "></i> New 
                    </a>
                </div>
            </div>
        </div>
    @endforeach
   
</div>
    
@endsection

