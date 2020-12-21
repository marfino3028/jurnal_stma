<!-- Name Field -->
<div class="form-group">
    <p>
    {!! Form::label('name', 'Name:') !!}
    {!! $user->name !!}</p>
</div>

<!-- Username Field -->
<div class="form-group">
    <p>
    {!! Form::label('username', 'Username:') !!}
    {!! $user->username !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    <p>
    {!! Form::label('role_id', 'Role:') !!}
    {!! $user->role->name !!}</p>
</div>


<!-- Email Field -->
<div class="form-group">
    <p>
    {!! Form::label('email', 'Email:') !!}
    {!! $user->email !!}</p>
</div>