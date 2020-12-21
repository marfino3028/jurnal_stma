@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>News</h3>
    <small>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('news.index') !!}">News</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    {{ Form::open(array('route' => 'news.store', 'enctype' => 'multipart/form-data')) }}
    @include('news.fields')
    {{ Form::close() }}
</div>
@endsection
