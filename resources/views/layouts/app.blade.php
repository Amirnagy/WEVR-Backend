<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title> WEVR  </title>
    <meta name="description" content="WEVR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>



    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">


    <!-- -------------- CSS - allcp forms -------------- -->
    {{-- <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/widget.css">

    <link rel="stylesheet" type="text/css" href="assets/js/plugins/select2/css/core.css">
--}}

    <!--  Custom css -->
    <link rel="stylesheet" type="text/css" href="/assets/custom.css">


    @stack('styles')



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
    </style>

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
    {{-- <script src="/assets/js/plugins/highcharts/highcharts.js"></script>
    <script src="/assets/js/plugins/c3charts/d3.min.js"></script>
    <script src="/assets/js/plugins/c3charts/c3.min.js"></script> --}}

    <!-- -------------- Simple Circles Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/circles/circles.js"></script> --}}

    <!-- -------------- Maps JSs -------------- -->
    {{-- <script src="/assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script> --}}
    {{-- <script src="/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script> --}}

    <!-- -------------- FullCalendar Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/fullcalendar/lib/moment.min.js"></script> --}}
    {{-- <script src="/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script> --}}

    <!-- -------------- Date/Month - Pickers -------------- -->
    {{-- <script src="/assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script> --}}
    {{-- <script src="/assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script> --}}

    <!-- -------------- Magnific Popup Plugin -------------- -->
    {{-- <script src="/assets/js/plugins/magnific/jquery.magnific-popup.js"></script> --}}

    <!-- -------------- Theme Scripts -------------- -->
    <script src="/assets/js/utility/utility.js"></script>
    <script src="/assets/js/demo/demo.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- -------------- Widget JS -------------- -->
    <script src="/assets/js/demo/widgets.js"></script>
    <script src="/assets/js/demo/widgets_sidebar.js"></script>
    <script src="/assets/js/pages/dashboard1.js"></script>

    <!-- Sweet alert -->
    <script src="/assets/js/sweetalert.min.js"></script>

    {{-- <script>
        $('#datetimepicker2').datetimepicker();


        (function($) {
            $.fn.blink = function(options) {
                var defaults = {
                    delay: 3000
                };
                var options = $.extend(defaults, options);

                return this.each(function() {
                    var obj = $(this);
                    setInterval(function() {
                        if ($(obj).css("visibility") == "visible") {
                            $(obj).css('visibility', 'hidden');
                        } else {
                            $(obj).css('visibility', 'visible');
                        }
                    }, options.delay);
                });
            }
        }(jQuery))

        /////////////////////////////////////////////

        $(document).ready(function() {
            $('.blink').blink(); // default is 500ms blink interval.
            $('.blink_second').blink({
                delay: 100
            }); // causes a 100ms blink interval.
            $('.blink_third').blink({
                delay: 1500
            }); // causes a 1500ms blink interval.
        });


    </script> --}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108812473-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-108812473-2');
    </script>


    {{-- <script src="/assets/js/pages/allcp_forms-elements.js"></script> --}}

    @stack('scripts')
</body>

</html>
