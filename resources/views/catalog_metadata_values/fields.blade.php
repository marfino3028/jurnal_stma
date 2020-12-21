<!-- Catalog Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catalog_id', 'Catalog Id:') !!}
    {!! Form::number('catalog_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Metadata Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metadata_id', 'Metadata Id:') !!}
    {!! Form::number('metadata_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('catalogMetadataValues.index') }}" class="btn btn-secondary">Cancel</a>
</div>
