<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
    <!-- SWIPPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


</head>

<style lang="">
    header {
        background-image: url("{{ asset('Ikea/src/public/img/hero.jpg') }}");
    }
</style>

<body class="" style="height: 600vh">
    <!-- Navbar start -->
    @include('includes.navbar')

    <!-- navbar end -->

    @yield('content')


    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    <!-- Swiper JS -->

</body>

</html>
