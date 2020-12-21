
<li class="nav-item {{ Request::is('catalogs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('catalogs.index') }}">
        <span class="nav-icon">
        <i class="fa fa-book"></i>
            </span>
        <span class="nav-text">Bibliography</span>
    </a>
</li>
