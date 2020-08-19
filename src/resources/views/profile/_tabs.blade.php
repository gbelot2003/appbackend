<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">{{ __('Activities') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile/edit') ? 'active' : '' }}" href="/profile/edit">{{ __('My Profile Info') }}</a>
        </li>
    </ul>
</div>