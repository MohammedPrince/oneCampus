<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Campus::DEV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./public/css/systemlogin.css">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .logo {
            max-width: 100px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .bottom-left {
            position: absolute;
            bottom: 10px;
            left: 10px;
            max-width: 80px;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
            max-width: 80px;
        }

        .form {
            max-width: 400px;
            margin: 0 auto;
        }

        .img-container img {
            width: 100%;
            height: auto;
        }

        .text-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
            font-size: 1.5rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        @media (max-width: 767.98px) {

            .logo,
            .bottom-left,
            .top-right {
                max-width: 60px;
            }

            .text-overlay {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
