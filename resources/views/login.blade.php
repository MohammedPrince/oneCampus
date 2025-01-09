@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <picture>
        <source srcset="./public/assets/logowithname.svg" type="image/svg+xml">
        <img src="./public/assets/logowithname.svg" class="logo" alt="Logo">
    </picture>
    <picture>
        <source srcset="./public/assets/bottomleft.svg" type="image/svg+xml">
        <img src="./public/assets/bottomleft.svg" class="bottom-left" alt="Bottom Left">
    </picture>
    <picture>
        <source srcset="./public/assets/topright.svg" type="image/svg+xml">
        <img src="./public/assets/topright.svg" class="top-right" alt="Top Right">
    </picture>

    <div class="container">
        <div class="row align-items-center min-vh-100" style="justify-content:center;">
            <div class="col-lg-12">
                <form class="form text-center">
                    <h2 class="text-center" style="color: #6C3A30;">Welcome Back</h2>
                    <div class="mb-3">
                        <label for="staffemail" class="form-label" style="color: #B77848;">Username</label>
                        <input type="email" class="form-control" id="staffemail" required>
                    </div>
                    <div class="mb-3">
                        <label for="staffpassword" class="form-label" style="color: #B77848;">Password</label>
                        <input type="password" class="form-control" id="staffpassword" required>
                    </div>
                    <a href="#" class="d-block mb-2" style="color: #B77848;">Forgot password?</a>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck" style="color: #6C3A30;">
                            Remember my username
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>

            <div class="col-md-6 d-none d-md-block">

                <div class="img-container position-relative">
                    <h4 class="text-center" style="color:#af4f36;">One Campus</h4>
                    <img src="./public/assets/paintinglogin2.svg" alt="Login Illustration" style="border-radius:20px;">

                </div>
            </div>
        </div>
    </div>




    <script src="js/localization.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


@endsection
