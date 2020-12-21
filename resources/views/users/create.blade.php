@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>User</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="{!! route('users.index') !!}">User</a>
            </li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    {!! Form::open(['route' => 'users.store']) !!}

    @include('users.fields')

 {!! Form::close() !!}
</div>
@endsection
