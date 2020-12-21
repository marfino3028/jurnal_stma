{!! Form::open(['route' => ['users.destroy', $row->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('users.show', $row->id) }}" class='btn btn-sm btn-ghost-success'>
       <i class="fa fa-eye text-success"></i>
    </a>
    
    <a href="{{ route('users.edit', $row->id) }}" class='btn btn-sm btn-ghost-info'>
       <i class="fa fa-edit text-info"></i>
    </a>
    
    
      
    {!! Form::button('<i class="fa fa-trash text-danger"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-sm btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
