<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>WEVR</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="WEVR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href={{asset("public/assets/landingpage/pics/sec-logo.png")}} type="image/x-icon">

    {{-- bootstrap link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- font awesone cloudflare --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('public/assets/dashboard/styles.css') }}" />

    @livewireStyles
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- sidebar -->



        <div id="page-content-wrapper">
            <!-- Page header-->
            @include('layouts.header')


            @yield('content')

            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                };
            </script>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>




            @stack('scripts')
            @livewireScripts

</body>

</html>
