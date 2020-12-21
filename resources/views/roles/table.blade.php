<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <th>#</th>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </thead>
        <tbody>
        @foreach($roles as $key=>$role)
            <tr>
                <td>{!! $key+1 !!}</td>
                <td>{!! $role->name !!}</td>
            <td>{!! $role->description !!}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>