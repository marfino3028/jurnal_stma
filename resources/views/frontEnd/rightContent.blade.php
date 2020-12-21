<div class="widget">
    <div class="widget-header" style="margin-bottom: 10px">
    @if (!Auth::user())
     <div class="center-block w-xxl w-auto-xs p-y-md">
        <div class="navbar">
            {{-- <div class="pull-center">
                <div>
                    <a class="navbar-brand"><img src="{{ URL::to('backEnd/assets/images/logo.png') }}" alt="."> <span
                            class="hidden-folded inline">Web Repository</span></a>
                </div>
            </div> --}}
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
                <br>
                <div class="md-form-group float-label {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control md-input {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Password" name="password">
                </div>
                <br>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
                <button id="btn-submit-login" type="submit" class="btn primary btn-block p-x-md m-b">Sign In</button>
            </form>
            <hr/>
        </div>
    </div>
                @else
   <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        {{ csrf_field() }}
                <button id="btn-submit-login" type="submit" class="btn primary btn-block p-x-md m-b">Logout</button>
<br>
                     </form>
        @endif
    <form action="{{route('search')}}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q" value="{{request('q')}}">
            <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
            </div>
        </div>
    </form>
    </div>
    <div class="widget-content">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                <i class="fa fa-table"></i> <span>Browse All Collections</span>
            </a>
            <a href="{{route('filter.by',['metadata' => 'Category'])}}" class="list-group-item"><span>Category</span></a>
            <a href="{{route('filter.by',['metadata' => 'Date'])}}" class="list-group-item"><span>By Issued Date</span></a>
            <a href="{{route('filter.by',['metadata' => 'Author'])}}" class="list-group-item"><span>Authors</span></a>
            <a href="{{route('filter.by',['metadata' => 'Title'])}}" class="list-group-item"><span>Titles</span></a>
            <a href="{{route('filter.by',['metadata' => 'Abstrak'])}}" class="list-group-item"><span>Subjects</span></a>
          </div>
        <div class="list-group">
            <a href="#" class="list-group-item active">
                <i class="fa fa-table"></i> <span>List Top 10</span>
            </a>
            <a href="{{route('filter.by',['metadata' => 'Views'])}}" class="list-group-item"><span>By most Views</span></a>
            <a href="{{route('filter.by',['metadata' => 'Download'])}}" class="list-group-item">By most Downloads<span></span></a>
          </div>
    </div>
</div>

<style>

    #btn-submit-login{
background-color: #0cc2aa;
color: aliceblue;
    }
</style>