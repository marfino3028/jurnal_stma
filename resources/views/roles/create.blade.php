@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Role</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('roles.index') !!}">Roles</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
     </ol>
    </small>
</div>
    
<div class=" row p-a">
    
@include('coreui-templates::common.errors')
{!! Form::open(['route' => 'roles.store']) !!}
    @include('roles.fields')
{!! Form::close() !!}
</div>
@endsection
