@extends('frontEnd.layout')

@section('content')
<style>
.show-hide {
    text-decoration:none;}
</style>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <div class="widget">
        <div class="widget-header">
            <h3>Hasil pencarian "{{ request('q') }}"</h3>
        </div>

        <div class="widget-content">
            <form action="{{ route('search') }}" method="get" class="form form-inline">
                <div class="row">
                    <div class="col-md-5">
                        {{ Form::select('cat_id', $categories, request('cat_id') ? request('cat_id') : 0, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="q"
                                value="{{ request('q') }}">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
 
<br>
<a  class="show-hide">Show Advanced Filters</a>
<span class="form-search" id="repeat" style="display:none">
  <h3>Filters</h3>
    <h5>use filters to refine the search results</h5>
    <br>
    <select id="metadata" name="metadata" form="metadata">
  <option value="title">Title</option>
  <option value="author">Author</option>
  <option value="subject">Subject</option>
  <option value="data">Data Issued</option>
  <option value="file">Has File</option>
</select>
  <select id="contains" name="contains" form="contains">
  <option value="contains">Contains</option>
  <option value="equal">Equal</option>
  <option value="id">ID</option>
  <option value="ncontains">Not Contains</option>
  <option value="nequal">Not Equal</option>
  <option value="nid">Not ID</option>
</select>
<input type="text" class="form-control" placeholder="Search" name="q" value="">
<button id="tambah" type="button">Tambah File</button>
<button type="button" class="login100-form-btn" name="add" data-i d="'+ counter +'" id="hapusRow" >Delete Row</font></button>
</span>
                    </div>
                  
                </div>
            </form>
            @foreach ($catalog as $key => $item)
                <p>
                    <strong>
                        <a href="{{ route('detail_catalog', $item->id) }}">
                            {{ get_metadata_value($item['catalog_metadata_value'], 'title') }}
                        </a>
                    </strong><br>
                    <em>
                        {{ get_metadata_value($item['catalog_metadata_value'], 'author') }}
                        {{ get_metadata_value($item['catalog_metadata_value'], 'date') }}
                    </em><br>
                    <small>
                        {{ Str::limit(get_metadata_value($item['catalog_metadata_value'], 'abstrak'), 200, '...') }}
                    </small>
                </p>
                <hr>
            @endforeach
        </div>
    </div>
    <script>
$(function(){
	$('.show-hide').on('click',function(){
  	if ($(this).text() == 'Show Advanced Filters'){
    	$(this).text('Hide Advanced Filters');
      $('.form-search').fadeIn(500);
    } else {
    		$(this).text('Show Advanced Filters')
        $('.form-search').fadeOut(500);
    }
  })
});
$(document).ready(function () {
        var counter = 1;
           var html = `
          <span class="form-search" id="repeat${counter}" style="display:none">
  <h3>Filters</h3>
    <h5>use filters to refine the search results
    <select id="metadata" name="metadata" form="metadata">
  <option value="title">Title</option>
  <option value="author">Author</option>
  <option value="subject">Subject</option>
  <option value="data">Data Issued</option>
  <option value="file">Has File</option>
</select>
  <select id="contains" name="contains" form="contains">
  <option value="contains">Contains</option>
  <option value="equal">Equal</option>
  <option value="id">ID</option>
  <option value="ncontains">Not Contains</option>
  <option value="nequal">Not Equal</option>
  <option value="nid">Not ID</option>
</select>
<input type="text" class="form-control" placeholder="Search" name="q" value="">
</span>
        `;
        $("#tambah").on("click", function () {
            $("#input").append(html);
            counter++;
        });
          $("#hapusRow").click(function(){
                $('#cover'+ $(this).attr('data-id')).remove();
            });
});
    </script>
@endsection
