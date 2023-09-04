<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')




</head>

<body class="" style="height: 700vh">
    <!-- Navbar start -->
    @include('includes.navbar-alternatif')
    <!-- navbar end -->

    @yield('content')

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')




</body>

</html>
