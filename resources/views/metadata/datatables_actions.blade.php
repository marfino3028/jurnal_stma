{!! Form::open(['route' => ['metadata.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('metadata.show', $id) }}" class='btn btn-sm  btn-ghost-success'>
       <i class="text-success fa fa-eye"></i>
    </a>
    <a href="{{ route('metadata.edit', $id) }}" class='btn btn-sm  btn-ghost-info'>
       <i class="text-warning fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'text-danger btn  btn-sm btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
