<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneCampus</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.svg') }}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">    
</head>

<body class="light-mode">
    @include('layouts.header')
   
    @include('layouts.nav')
     
    <!-- Bottom Navigation Bar -->

    <div id="main-content" class="container-fluid" style="margin-left: 210px; width: calc(100% - 230px);">
        <div id="user-management" class="content-page" style="display: block;">
      
            @yield('content')
        </div>

    </div>
    <!-- Core Libraries -->
    {{-- <script src="{{ asset('js/jquery-3.6.0.min_new.js') }}"></script> --}}
    {{-- Depended Select --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins and Custom Scripts -->
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('js/tablefilter.js') }}"></script>
    <script src="{{ asset('js/navs.js') }}"></script>
    <script src="{{ asset('js/pages.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/formValidation.js') }}"></script>
    <script src="{{ asset('js/formhandler.js') }}"></script>
    @include('layouts.scripts')
   
</body>

</html>
