@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Categories</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">Categories</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('flash::message')

    <a class="btn btn-fw primary btn-sm" href="{!! route('categories.create') !!}">
        <i class="fa fa-plus-square fa-lg"></i> New Category
    </a>
    @include('categories.table')

</div>

@endsection

