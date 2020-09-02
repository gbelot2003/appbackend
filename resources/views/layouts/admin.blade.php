<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.admin.head')

 
</head>

<body id="page-top">

    <div id="wrapper">

        @include('layouts.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                @include('layouts.admin.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('layouts.admin.toast')
                    <!-- Page Heading -->
                    @include('layouts.admin.heading', ['title'])

                    @yield('labels')
                    @include('flash::message')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('layouts.admin.footer')

            <!-- Flexbox container for aligning the toasts -->

        </div>
    </div>
    <!-- End of Content Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    @include('layouts.admin.logout')
    <!-- Bootstrap core JavaScript-->
    <script src="/js/app.js"></script>


</body>

</html>
