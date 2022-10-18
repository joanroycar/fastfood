<!DOCTYPE html>

<html lang="es" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ URL::asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de ventas">
        <meta name="keywords" content="ventas">
        <meta name="author" content="LEFT4CODE">
        <title>FastFood</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ URL::asset('css/snackbar.min.css')}}" />

        <link rel="stylesheet" href="{{ URL::asset('dist/css/app.css')}}" />
        <link rel="stylesheet" href="{{ URL::asset('css/all.css')}}" />
        <script src="{{ asset('js/kioskboard.js')}}"> </script>

        <link rel="stylesheet" href="{{ asset('css/mc-calendar.min.css') }}">
        <script src="{{ asset('js/mc-calendar.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/apexcharts.css') }}" />
        <script src="{{ asset('js/apexcharts.js') }}"></script>
        <style>
            .image-fit>img{

                object-fit: containt!important;
                
            }

            nav p{
                display: none !important;
            }
        </style>

        <!-- END: CSS Assets-->

        <livewire:styles />


    </head>
    <!-- END: Head -->

    <body class="main">

        

        
        <!-- BEGIN: Mobile Menu -->
        @include('layouts.theme.mobile-menu')

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('layouts.theme.sidebar')

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @include('layouts.theme.topbar')

                {{$slot}}


                <!-- END: Top Bar -->
               
            </div>
            <!-- END: Content -->
        </div>
       
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->

        @include('layouts.theme.footer')
        <!-- END: JS Assets-->
        <livewire:scripts />

    </body>
</html>