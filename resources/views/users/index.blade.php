@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Users</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('flash::message')
    @include('coreui-templates::common.errors')

    {!! Form::open(['route' => 'users.import','files'=>true]) !!}
    <a class="btn btn-fw primary btn-sm" href="{!! route('users.create') !!}">
        <i class="fa fa-plus-square fa-lg"></i> New User
    </a>
    <span class="pull-right">
        {!! Form::label('users', 'Import User:') !!}
        {!! Form::file('users', null, ['class' => 'form-control']) !!}
    {!! Form::submit('Import', ['class' => 'btn btn-fw primary btn-sm']) !!}
    </span>
    <a class="btn btn-fw info btn-sm" href="{!! asset('import.xlsx') !!}">
        <i class="fa fa-download fa-lg"></i> Download Template
    </a>
    {!! Form::close() !!}
    
@include('users.table')

</div>

@endsection
