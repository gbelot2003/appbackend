<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        @can('ver_perfil_propio')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">{{ __('Activities') }}</a>
        </li>
        @endcan
         @can('editar_perfil_propio')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile/edit') ? 'active' : '' }}" href="/profile/edit">{{ __('My Profile') }}</a>
        </li>
        @endcan
    </ul>
</div>