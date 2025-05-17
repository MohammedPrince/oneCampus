<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneCampus</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.svg') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 6px 12px;
    margin: 2px;
    border-radius: 4px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    color: #333 !important;
    cursor: pointer;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #e2e6ea;
    color: #000 !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #0d6efd;
    color: white !important;
    border: 1px solid #0d6efd;
}
</style>

    
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
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap5.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <!-- Plugins and Custom Scripts -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('js/tablefilter.js') }}"></script>
    <script src="{{ asset('js/navs.js') }}"></script>
    <script src="{{ asset('js/pages.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/formValidation.js') }}"></script>
    <script src="{{ asset('js/formhandler.js') }}"></script>
<script>
$(document).ready(function() {
    $('table.table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print'
        ],
        responsive: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            paginate: {
                previous: "<i class='fas fa-chevron-left'></i> Prev",
                next: "Next <i class='fas fa-chevron-right'></i>"
            }
        }
    });
});
</script>
    <!-- Custom Inline Scripts -->
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

    @yield('scripts')


</body>

</html>
