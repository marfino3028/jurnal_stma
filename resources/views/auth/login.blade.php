<!DOCTYPE html>
<html lang="en">
<head>
    @include('backEnd.includes.head')
</head>
<body>
<div class="app" id="app">

    <!-- ############ LAYOUT START-->
    <div class="center-block w-xxl w-auto-xs p-y-md">
        <div class="navbar">
            <div class="pull-center">
                <div>
                    <a class="navbar-brand"><img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="."> <span
                            class="hidden-folded inline">Web Repository</span></a>
                </div>
            </div>
        </div>
        <div class="p-a-md box-color r box-shadow-z1 text-color">
            <div class="m-b text-sm">
                Sign In to your Acccount
            </div>
            <form name="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                @if($errors ->any())
                    <div class="alert alert-danger m-b-0">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="md-form-group float-label {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="form-control md-input {{ $errors->has('username')?'is-invalid':'' }}" name="login" value="{{ old('username') }}"
                    placeholder="Username / Email">

                </div>
                <div class="md-form-group float-label {{ $errors->has('password') ? ' has-error' : '' }}">

                    <input type="password" class="form-control md-input {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Password" name="password">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <button type="submit" class="btn primary btn-block p-x-md m-b">Sign In</button>
            </form>
            <hr/>
        </div>



    </div>

    <!-- ############ LAYOUT END-->


</div>
@include('backEnd.includes.foot')
</body>
</html>

