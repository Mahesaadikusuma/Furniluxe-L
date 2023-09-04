<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    @include('includes.style')

</head>

<body class="">
    <!-- Main -->
    @yield('content')
    <!-- Main End -->

    @include('includes.script')
</body>

</html>
