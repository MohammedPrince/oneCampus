<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.svg') }}">
    <title>OneCampus</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/campuslogin.css') }}">
</head>

<body>
    <!-- Bottom-right image -->
    <img src="{{ asset('assets/bottomleft.svg') }}" class="bottom-left" alt="bottomleft" draggable="false">
    <!-- Top-left image -->
    <img src="{{ asset('assets/topright.svg') }}" class="top-right" alt="topright" draggable="false">

    <div class="text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <h1 class="display-1">500 ❗</h1>
        <p class="lead" >Oops! Something went wrong on our server.</p>
        <p>We're working to fix this issue. Please try again later.</p>
    </div>
</body>
</html>