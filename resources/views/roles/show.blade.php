@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Role</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('roles.index') !!}">Role</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    <div class="row" style="padding: 0 30px">
        @include('roles.show_fields')
    </div>
    <div style="margin: 20px 0px 0px 15px;border-top: 1px solid #ECECEC;padding-top:10px ">
    <a href="{{route('roles.index')}}" class="btn btn-sm btn-info">Back</a>
    </div>
</div>
   
@endsection
