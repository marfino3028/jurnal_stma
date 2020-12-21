
@can('isAdmin')
    @include('layouts.menu-admin')
@elsecan('isDosen')
    @include('layouts.menu-operator')
@elsecan('isMahasiswa')
    @include('layouts.menu-operator')
@else
    @include('layouts.menu-registered')
@endcan
