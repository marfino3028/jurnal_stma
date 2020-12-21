@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Category</h3>
    <small>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('categories.index') !!}">Category</a>
      </li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
    </small>
</div>
<div class=" row p-a">
    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}
    @include('categories.fields')
    {!! Form::close() !!}
</div>
@endsection