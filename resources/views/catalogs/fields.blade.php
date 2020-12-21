{!! Form::hidden('user_id', Auth::user()->id) !!}
{!! Form::hidden('category_id', $category_id) !!}
<div style="margin: 5px 10px;" class="form-group">
    <h5 >Metadata</h5>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item ">
          <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Simple Item</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#full-item" role="tab" data-toggle="tab">Full Item</a>
        </li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content" style="margin-top: 10px">
        <div role="tabpanel" class="tab-pane fade in active" id="profile" style="margin: 5px 15px">
            @foreach ($katalog_metadata as $item)
                @if ($item->type==0)
                <div class="form-group row">
                    {!! Form::label('metadata['.$item->metadata->id.']', $item->metadata->value,['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::hidden('metadata['.$item->metadata->id.'][key]', $item->metadata->key,['class'=>'col-md-2 control-label']) !!}
                    @if ($item->metadata->type=='textarea')
                    {!! Form::textarea('metadata['.$item->metadata->id.'][value]', null, ['class' => 'form-control','required'=>'required']) !!}
                    @else
                    {!! Form::text('metadata['.$item->metadata->id.'][value]', null, ['class' => 'form-control','required'=>'required']) !!}
                    @endif
                </div>
                </div>
                @endif
            @endforeach
        </div>
        <div role="tabpanel" class="tab-pane fade" id="full-item" style="margin: 5px 15px">
            @foreach ($katalog_metadata as $item)
            @if ($item->type==1)
            <div class="form-group row">
                {!! Form::label('metadata['.$item->metadata->id.']', $item->metadata->value,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::hidden('metadata['.$item->metadata->id.'][key]', $item->metadata->key,['class'=>'col-md-2 control-label']) !!}
                @if ($item->metadata->type=='textarea')
                {!! Form::textarea('metadata['.$item->metadata->id.'][value]', null, ['class' => 'form-control','required'=>'required']) !!}
                @else
                {!! Form::text('metadata['.$item->metadata->id.'][value]', null, ['class' => 'form-control','required'=>'required']) !!}
                @endif
            </div>
            </div>
            @endif
        @endforeach
        </div>
      </div>
</div>
<hr>
<div class="form-group">
 <h5 style="margin: 5px 10px;">Berkas</h5>
<div id="input">
<div class="form-group col-sm-6" id="cover">
        {!! Form::label('cover', 'Cover:', ['class' => 'text-primary']) !!}
        {!! Form::file('cover[]', null, ['class' => 'form-control']) !!}
    </div>
<!-- Full Field -->
    <div class="form-group col-sm-6" id="full">
        {!! Form::label('full', 'Full:', ['class' => 'text-primary']) !!}
        {!! Form::file('full[]', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div id="input">
@foreach ($metadata as $metadatas) 
<div class="form-group col-sm-6" >
        {!! Form::label($metadatas->key, $metadatas->key, ['class' => 'text-primary']) !!}
        <input type="{{$metadatas->type}}" class="form-control" name="metadata[{{$metadatas->id}}]">
    </div>
@endforeach

</div>
<!-- User Id Field -->
<div class="form-group col-sm-2">
    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-md-12">
    {!! Form::hidden('category_id', $category_id, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-12">

    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('catalogs.index') }}" class="btn btn-secondary">Cancel</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {!! Form::button('Tambah Row', ['class' => 'btn btn-sucess', 'id' => 'tambah']) !!}
{!! Form::button('Delete Row', ['class' => 'btn btn-danger', 'id' => 'delete']) !!}
</div>
<!-- Cover Field -->

</div>

<script>
$(document).ready(function () {
        var counter = 1;
           var html = `
           
           <div class="form-group col-sm-6" id="cover${counter}">
        {!! Form::label('cover', 'Cover:', ['class' => 'text-primary']) !!}
        {!! Form::file('cover[]', null, ['class' => 'form-control']) !!}
        </div>
    <!-- Full Field -->
        <div class="form-group col-sm-6" id="full">
            {!! Form::label('full', 'Full:', ['class' => 'text-primary']) !!}
            {!! Form::file('full[]', null, ['class' => 'form-control']) !!}
        </div>
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



   