

<li class="nav-dropdown {{ Request::is('roles*') ||Request::is('categories*') ||Request::is('metadata*')   ? 'active ' : '' }}">
<a><span class="nav-caret"><i class="fa fa-caret-down"></i></span><span class="nav-icon">
    <i class="material-icons">&#xe1b8;</i>
</span>
        <span class="nav-text">Master Data</span>
    </a>
    <ul class="nav-sub">

        <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link " href="{!! route('roles.index') !!}">
 
                <span class="nav-text">Roles</span>
            </a>
        </li>
      
        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="nav-text">Categories</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('metadata*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('metadata.index') }}">
                <span class="nav-text">Metadata</span>
            </a>
        </li>
        
    </ul>
</li>

<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a data-pjax=false class="nav-link " href="{!! route('users.index') !!}">
        <span class="nav-icon">
            <i class="fa fa-users"></i>
        </span>
        <span class="nav-text">Keanggotaan </span>
    </a>
</li>

<li class="nav-item {{ Request::is('catalogs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('catalogs.index') }}">
        <span class="nav-icon">
        <i class="fa fa-book"></i>
            </span>
        <span class="nav-text">Bibliography</span>
    </a>
</li>

<li class="nav-item {{ Request::is('news*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.index') }}">
        <span class="nav-icon">
        <i class="fa fa-book"></i>
            </span>
        <span class="nav-text">News</span>
    </a>
</li>