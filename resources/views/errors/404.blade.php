{{-- @extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Page Not Found</div>
                <div class="card-body text-center">
                    <h1 class="display-1">404</h1>
                    <p class="lead">Oops! The page you are looking for could not be found.</p>
                    <img src="{{ asset('assets/icons/404.svg') }}" alt="404 Error" class="img-fluid mb-4" style="max-height: 200px;">
                    <div>
                        {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary">Return to Dashboard</a> --}}
{{-- </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=dzevice-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.svg') }}">


    <title>OneCampus</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/campuslogin.css') }}">

</head>

<body>

    <!-- Top-left image -->

    <img src="{{ asset('assets/bottomleft.svg') }}" class="bottom-left" alt="bottomleft" draggable="false">

    <!-- Bottom-right image -->

    <img src="{{ asset('assets/topright.svg') }}" class="top-right" alt="topright" draggable="false">


    {{-- 404 --}}

    <div class="card-body text-center">
        <h1 class="display-1"> 404 ⚠️</h1>
        <p class="lead">Oops! The page you are looking for could not be found.</p>
        {{-- <img src="{{ asset('assets/icons/404.svg') }}" alt="404 Error" class="img-fluid mb-4" style="max-height: 200px;"> --}}
    </div>

</body>

</html>
