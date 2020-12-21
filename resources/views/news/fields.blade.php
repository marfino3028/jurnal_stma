{!! Form::hidden('id_news', $id_news) !!}
<div style="margin: 5px 10px;" class="form-group">
    <h5 >News</h5>
      <!-- Tab panes -->
      <div class="tab-content" style="margin-top: 10px">
        <div role="tabpanel" class="tab-pane fade" id="full-item" style="margin: 5px 15px">
        {!! Form::label('judul', 'Judul:') !!}
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}

        {!! Form::label('deskripsi', 'Deskripsi:') !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
        
        {!! Form::label('Image', 'Image:', ['class' => 'text-primary']) !!}
        {!! Form::file('img', null, ['class' => 'form-control']) !!}
        
        </div>
      </div>
</div>
<hr>

<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a> 
</div>
<!-- Cover Field -->

</div>




   