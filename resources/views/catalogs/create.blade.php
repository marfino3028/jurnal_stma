@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Catalog</h3>
    <small>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('catalogs.index') !!}">Catalog</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    {{ Form::open(array('route' => 'catalogs.store', 'enctype' => 'multipart/form-data')) }}
    @include('catalogs.fields')
    {{ Form::close() }}
</div>
@endsection
