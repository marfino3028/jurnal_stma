@extends('frontEnd.layout')

@section('content')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>
<div class="widget">
    <div class="widget-header">
    <div class="table-responsive">  
                     <div align="center">  
                     <?php  
                          $character = range('A', 'Z');  
                          echo '<ul class="pagination">';  
                          foreach($character as $alphabet)  
                          {  
                               echo '<li><a href="index.php?character='.$alphabet.'">'.$alphabet.'</a></li>';  
                          }  
                          echo '</ul>';  
                     ?>  
                     </div>  
        <h3>
            {{$judul}}
            {{-- ebook --}}
        </h3>
    </div>
</div>
    <div class="widget-content">
        <?php $no=1 ?>
        @foreach ($data->catalogs as $key)
        <p>
            <strong>
                <a href="{{url('detail/catalog',$key->id)}}">
                    {{{ get_first_char_each_word($judul) }}} - {{$key->cover}}
                </a>
            </strong>
        </p><br>
        @endforeach
    </div>
    <div class="widget-footer pull-right">
        {{-- {{ $data->links() }} --}}
    </div>
</div>
@endsection