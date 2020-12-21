@extends('layouts.app')

@section('content')
<div class="box-header dker">
    <h3>News</h3>
    <small>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{!! route('home') !!}">Home</a>
            </li>
            <li class="breadcrumb-item active">News</li>
     </ol>
    </small>
</div>
<div class="box-body row">
    @include('flash::message')
    <a class="btn btn-fw primary btn-sm" href="{!! route('news.create') !!}">
        <i class="fa fa-plus-square fa-lg"></i> New News
    </a>
    <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Berita</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody> 
          @php 
          $no=1;
          @endphp
          @foreach($news as $row)                     
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->judul}}</td>
              {{-- <td>@if(!empty($row->img))
                <img id="myImg" style="width:100%;max-width:50px"
                     src="{{asset('news/')}}/{{ $row->img }}" />
            @else
                <img  style="width:100%;max-width:50px"
                     src="{{asset('img/no-photo.png')}}" alt="">
            @endif</td> --}}
              <td>
                  <form action="{{route('news.destroy',$row->id_news)}}" method="POST">
                      <a href="{{route('news.edit',$row->id_news)}}" class="btn btn-sm btn-primary">Edit</a>
                      <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      @csrf 
                      @method('DELETE')
                  </form>
              </td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>          

          </tfoot>
        </table>

    
@endsection

