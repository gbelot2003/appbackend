<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.admin.head')
</head>

<body class="bg-gradient-primary">

<div class="container">
    @yield('content')
</div>
<!-- Bootstrap core JavaScript-->
<script src="/js/app.js"></script>


</body>

</html>
