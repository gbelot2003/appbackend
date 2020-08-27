<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-th-large"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}<sup>1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard  titlulo-->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
@if(auth()->user()->can('ver_usuarios') || auth()->user()->can('ver_roles'))

    <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Configurations') }}
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ __('Users and Security') }}</span>
            </a>
        @if(Request::is('users') || Request::is('users/*') || Request::is('roles') || Request::is('roles/*'))
            <!-- {{ $usuarios = 'tr' }} -->
            @endif

            <div id="collapseTwo" class="collapse {{ isset($usuarios) ? 'show' : '' }}" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{ __('User & Permissions') }}:</h6>
                    @can('ver_usuarios')
                        <a class="collapse-item {{ Request::is('users') ? 'active' : '' }}"
                           href="/users">{{ __('Users List') }}</a>
                    @endcan
                    @can('ver_roles')
                        <a class="collapse-item {{ Request::is('roles') ? 'active' : '' }}"
                           href="/roles">{{ __('Roles & Permissions') }}</a>
                    @endcan
                </div>
            </div>
        </li>
@endif


<!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

