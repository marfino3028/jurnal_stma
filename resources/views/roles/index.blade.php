@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Roles</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">Roles</li>
     </ol>
    </small>
</div>
    
<div class=" row p-a">
    @include('flash::message')

    <a class="btn btn-fw primary btn-sm" href="{!! route('roles.create') !!}">
    <i class="fa fa-plus-square fa-lg"></i> New Role
</a>
</div>
@include('roles.table')
<div class="pull-right mr-3">
        
</div>

@endsection

