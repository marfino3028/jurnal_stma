
@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Role</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('roles.index') !!}">Roles</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
     </ol>
    </small>
</div>
    
<div class=" row p-a">
    
@include('coreui-templates::common.errors')
{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
    @include('roles.fields')
{!! Form::close() !!}
           
@endsection
