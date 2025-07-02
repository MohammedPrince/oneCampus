<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>OneCampus:: In Development</title>
    <link rel="icon" type="image/x-icon" href="/public/assets/logo.svg">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/main.css">
=======
    <title>OneCampus</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.svg') }}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">    
>>>>>>> d1eb4034234ab8e531076a2c6ec2fb80ac5f32e0
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
<<<<<<< HEAD

    <script>
        function filterTable() {
            const searchInput = document.getElementById("tableSearch").value.toLowerCase();
            const tableRows = document.querySelectorAll("#tableBody tr");

            tableRows.forEach((row) => {
                const cells = row.querySelectorAll("td");
                const rowText = Array.from(cells)
                    .map((cell) => cell.textContent.toLowerCase())
                    .join(" ");
                row.style.display = rowText.includes(searchInput) ? "" : "none";
            });
        }
    </script>
    <script src="/public/js/tablefilter.js"></script>
    <script src="/public/js/bootstrap.bundle.min.js"></script>

    <script src="/public/js/jquery.min.js"></script>

    <script src="/public/js/navs.js"></script>
    <script src="/public/js/pages.js"></script>
    <script src="/public/js/theme.js"></script>
    <script src="/public/js/formValidation.js"></script>
    <script src="/public/js/formhandler.js"></script>
    <script src="/public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/public/js/popper.min.js"></script>

=======
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
   
>>>>>>> d1eb4034234ab8e531076a2c6ec2fb80ac5f32e0
</body>

</html>
