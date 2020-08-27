<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    @include('layouts.admin.topbar.search')

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->


        <!-- Nav Item - Messages -->


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        @include('layouts.admin.topbar.users')

    </ul>

</nav>
<!-- End of Topbar -->
