@section('css')
    @include('layouts.datatables_css')
@endsection

<table class="table" id="catalog">
    <thead>
    <tr>
        <th >No</th>
        <th >Title</th>
        <th >Author</th>
        <th >User Name</th>
        <th >Date Submitted</th>
        <th >Status</th>
        <th class="col-md-4">Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($catalogs as $key=>$item)
        <tr>
            <td >{!! $key+1 !!}</td>
                <td > {!! $item->getMetadata('title',$item->value)->metadata_key !!} </td>                    
                <td > {!! $item->getMetadata('author',$item->value)->metadata_key !!} </td>                    
            <td > {!! $item->getUser()->name; !!} </td>
            <td > {!! $item->created_at !!} </td>
            <td >
                @if ($item->status==1)
                    <span class="label-success label">Approved</span>
                @else
                    <span class="label-warning label">Draft</span>
                @endif
            </td>
            <td >
               <div class="btn-group">
                
                @can('isAdmin')
                {!! Form::open(['route' => ['catalogs.update_status', $item->id], 'method' => 'put','class'=>'pull-left']) !!}
                @if ($item->status == 1)
                {!! Form::button('<i class="fa fa-close"></i> Un-Approve', [
                    'type' => 'submit',
                    'class' => 'btn btn-sm btn-warning',
                    'style'=>'margin-right: 5px',
                    'onclick' => "return confirm('Are you sure?')"
                ]) !!}
                @else
                {!! Form::button('<i class="fa fa-check"></i> Approve', [
                    'type' => 'submit',
                    'class' => 'btn btn-sm btn-success',
                    'style'=>'margin-right: 5px',
                    'onclick' => "return confirm('Are you sure?')"
                ]) !!}
                @endif
                @endcan

                {!! Form::close() !!}

                {!! Form::open(['route' => ['catalogs.destroy', $item->id], 'method' => 'delete','class'=>'pull-right']) !!}
                        
                        <a href="{{ route('catalogs.show', $item->id) }}" class='btn btn-sm btn-primary' style="margin-right: 5px">
                            <i class="fa fa-eye"></i> Show
                            </a>
                        <a href="{{ route('catalogs.edit', $item->id) }}" class='btn btn-sm btn-info' style="margin-right: 5px">
                        <i class="fa fa-edit"></i> Edit
                        </a>
                        {!! Form::button('<i class="fa fa-trash"></i> Delete', [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'onclick' => "return confirm('Are you sure?')"
                        ]) !!}
                    {!! Form::close() !!}
               </div>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

@section('scripts')
    @include('layouts.datatables_js')
    <script>
        $('document').ready(function(){
            $('#catalog').dataTable();
        });
    </script>
@endsection
