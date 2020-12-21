@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>Catalog</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('catalogs.index') !!}">Catalog</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
    </small>
</div>
<div class=" row p-a">
    @include('coreui-templates::common.errors')
    @include('flash::message')

    <div class="row" style="padding: 0 30px">
        @include('catalogs.show_fields')

    </div>
    <div style="margin: 20px 0px 0px 15px;border-top: 1px solid #ECECEC;padding-top:10px ">
    <a href="{{ url()->previous()  }}" class="btn btn-sm btn-info">Back</a>

    </div>
</div>
@endsection
