<!-- Catalog Id Field -->
<div class="form-group">
    {!! Form::label('catalog_id', 'Catalog Id:') !!}
    <p>{{ $catalogMetadataValue->catalog_id }}</p>
</div>

<!-- Metadata Id Field -->
<div class="form-group">
    {!! Form::label('metadata_id', 'Metadata Id:') !!}
    <p>{{ $catalogMetadataValue->metadata_id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $catalogMetadataValue->value }}</p>
</div>

