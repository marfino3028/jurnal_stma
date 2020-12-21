@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Catalogs Category</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{!! route('catalogs.index') !!}">Catalogs</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('flash::message')

    <a class="btn btn-fw primary btn-sm" href="{!! route('catalogs.create_with_category',$category_id) !!}">
        <i class="fa fa-plus-square fa-lg"></i> New Catalog
    </a>
    @include('catalogs.table_with_category')

</div>

@endsection

