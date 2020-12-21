@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>User</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="{!! route('users.index') !!}">User</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    @if (Request::is('profile*'))
    {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch']) !!}
        
    @else
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
        
    @endif

      @include('users.fields')

      {!! Form::close() !!}
</div>
@endsection