@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Metadata</h3>
    <small>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('metadata.index') !!}">Metadata</a>
      </li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    </small>
</div>
<div class=" row p-a">
    {!! Form::model($metadata, ['route' => ['metadata.update', $metadata->id], 'method' => 'patch']) !!}

    @include('metadata.fields')

    {!! Form::close() !!}
</div>
@endsection