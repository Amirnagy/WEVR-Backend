<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title> WEVR </title>
    <meta name="description" content="WEVR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>



    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">
    <link rel="stylesheet" type="text/css" href='/assets/fonts/icomoon/icomoon.css'>


    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/widget.css">

    <link rel="stylesheet" type="text/css" href="assets/js/plugins/select2/css/core.css">


    <!--  Custom css -->
    <link rel="stylesheet" type="text/css" href="/assets/custom.css">
    <!-- custom bootstrap -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}





    <style type="text/css">
        .blink {
            color: mediumblue;
        }

        .blink_second {
            color: red;
        }

        .blink_third {
            color: yellow;
        }

        .apartment-form {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border:
        }

        .apartment-form .form-group .addbutton {
            background-color: #007bff;
            color: #fff;
            border:

        }

        .text-pop {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.757);
            z-index: 100;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: 0.4s;
        }

        .open-pop {
            opacity: 1;
            visibility: visible;
        }

        .text-pop .pop-content {
            position: absolute;
            width: 90%;
            margin: 100px 0px;
            background: white;
            padding: 30px 30px 0px 30px;
            border-radius: 10px;
            opacity: 0;
            visibility: hidden;
            margin-top: 140px;
            transition: 0.4s;
        }

        .open-pop .pop-content {
            opacity: 1;
            visibility: visible;
            margin-top: 100px;
        }
        input[type="text"], input[type="number"], textarea{
            width: 82%;
            padding: 3px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
    @livewireStyles
</head>

<body class="dashboard-page">

    <div id="main">

        <!---- Header  ----->
        @include('layouts.header')


        <!----- Sidebar  ------->
        <aside id="sidebar_left" class="nano nano-light affix">

            <!-------- Sidebar Left Wrapper  -------->
            <div class="sidebar-left-content nano-content">

                <header class="sidebar-header">

                    @include('layouts.sidebar')



            </div>


        </aside>

        <section id="content_wrapper">
            <!-- yield section  -->

            @yield('content')


        </section>


    </div>

    <!-- -------------- Scripts -------------- -->

    <!-- -------------- jQuery -------------- -->
    <script src="/assets/js/jquery/jquery-1.11.3.min.js"></script>
    {{-- <script src="/assets/js/jquery/jquery-2.2.4.min.js"></script> --}}
    {{-- <script src="/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script> --}}

    <!-- -------------- HighCharts Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/highcharts/highcharts.js"></script> --}}
    {{-- <script src="/assets/js/plugins/c3charts/d3.min.js"></script> --}}
    {{-- <script src="/assets/js/plugins/c3charts/c3.min.js"></script> --}}

    <!-- -------------- Simple Circles Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/circles/circles.js"></script> --}}

    <!-- -------------- Maps JSs -------------- -->
    <script src="/assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

    <!-- -------------- FullCalendar Plugin -------------- -->
    <script src="/assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
    <script src="/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- -------------- Date/Month - Pickers -------------- -->
    <script src="/assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
    <script src="/assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

    <!-- -------------- Magnific Popup Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/magnific/jquery.magnific-popup.js"></script> --}}

    <!-- -------------- Theme Scripts -------------- -->
    <script src="/assets/js/utility/utility.js"></script>
    <script src="/assets/js/demo/demo.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- -------------- Widget JS -------------- -->
    {{-- <script src="/assets/js/demo/widgets.js"></script> --}}
    {{-- <script src="/assets/js/demo/widgets_sidebar.js"></script> --}}
    <script src="/assets/js/pages/dashboard1.js"></script>

    {{-- for bootstarp view image --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




    @livewireScripts

</body>

</html>
