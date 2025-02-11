<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneCampus:: In Development</title>
    <link rel="icon" type="image/x-icon" href="/public/assets/logo.svg">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/main.css">
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

</body>

</html>
