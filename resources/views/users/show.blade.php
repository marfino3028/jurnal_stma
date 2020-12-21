@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>User</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('users.index') !!}">User</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    <div class="row" style="padding: 0 30px">
        @include('users.show_fields')
    </div>
    <div style="margin: 20px 0px 0px 15px;border-top: 1px solid #ECECEC;padding-top:10px ">
    <a href="{{route('users.index')}}" class="btn btn-sm btn-info">Back</a>
    </div>
</div>
     
@endsection
