<!-- Name Field -->
<div class="form-group">
    <p>
    {!! Form::label('name', 'Name:') !!}
    {{ $category->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    <p>
    {!! Form::label('description', 'Description:') !!}
    {{ $category->description }}</p>
</div>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-md-6">Simple Item Record</th>
                <th class="col-md-6">Full Item Record</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-6">
                    {!! Form::open(['route' => 'katalogMetadatas.store']) !!}
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <input type="hidden" name="type" value="0">
                        {!! Form::select('metadata[]',$metadata,null,['class'=>'col-md-8','multiple'=>"multiple"]) !!}
                        <button class="btn btn-sm btn-primary" type="submit">Add</button>
                    {!! Form::close() !!}
                </td>
                <td class="col-md-6">
                    {!! Form::open(['route' => 'katalogMetadatas.store']) !!}
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <input type="hidden" name="type" value="1">
                    {!! Form::select('metadata[]',$metadata,null,['class'=>'col-md-8','multiple'=>"multiple"]) !!}
                    <button class="btn btn-sm btn-primary" type="submit">Add</button>
                    {!! Form::close() !!}

                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                    <ul>
                    @foreach ($katalogMetadata as $item)
                        @if ($item->type==0)
                        {!! Form::open(['route' => ['katalogMetadatas.destroy', $item->metadata_id], 'method' => 'delete']) !!}
                            <li>
                                {{$item->metadata->value}}
                                {!! Form::button('<i class="text-danger fa fa-close"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-link p-0 m-0 d-inline align-baseline',
                                    'onclick' => "return confirm('Are you sure?')"
                                ]) !!}
                        {!! Form::close() !!}
                        @endif
                    @endforeach
                    </ul>
                </td>
                <td class="col-md-6">
                    <ul>
                    @foreach ($katalogMetadata as $item)
                        @if ($item->type==1)
                        {!! Form::open(['route' => ['katalogMetadatas.destroy', $item->metadata_id], 'method' => 'delete']) !!}
                            <li>
                                {{$item->metadata->value}} 
                                {!! Form::button('<i class="text-danger fa fa-close"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-link p-0 m-0 d-inline align-baseline',
                                    'onclick' => "return confirm('Are you sure?')"
                                ]) !!} 
                        {!! Form::close() !!}
                        @endif
                    @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>
