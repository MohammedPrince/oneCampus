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
        <div class="row g-0">
            <div class="col-5 p-4 align-content-center">
                <div class="radio-dropdown" style="margin-left: 228px;">
                    <i class="bi bi-globe" style="font-size: 0.9rem;color: #6C3A30;"></i>

                    <div class="dropdown-menu">
                        <div class="radio-item">
                            <input type="radio" id="english" name="language" value="en" class="radio-input" checked>
                            <label for="english" class="radio-label small" data-i18n="english">English
                                <span class="radio-circle"></span>
                            </label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="arabic" name="language" value="ar" class="radio-input">
                            <label for="arabic" class="radio-label small" data-i18n="arabic">Arabic
                                <span class="radio-circle"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <form class="form">

                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <h2 style="color: #6C3A30; margin-top: 40px; margin-bottom: 20px;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                                data-i18n="welcomeback">Welcome Back</h2>
                        </blockquote>
                    </figure>
                    <div class="text-overlay"></div>

                    <label for="exampleFormControlInput1" class="form-label"
                        style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="username">Username</label>
                    <input type="email" class="form-control form-control-sm" id="staffemail" placeholder="" required>

                    <label for="inputPassword5" class="form-label"
                        style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="password">Password</label>
                    <input type="password" id="staffpassword" class="form-control form-control-sm"
                        aria-describedby="passwordHelpBlock" required>

                    <a href="#" class="href link"
                        style="color: #B77848; font-size: 12px;align-items: flex-end;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="forgot">Forgot password</a>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck"
                            style="color: #6C3A30; font-size: 12px;margin-bottom: 20px;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                            data-i18n="remember">
                            Remember my username
                        </label>
                    </div>

                    <button type="submit" id="staffLogin" class="btn btn-custom w-100" data-i18n="login"
                        style="margin-top: 10px;">Login</button>


                </form>
            </div>


        </div>
    </div>

    <div class="img-container col-7 g-0 g-0 d-none d-md-block">
        <img src="./public/assets/paintinglogin2.svg" alt="..."draggable="false">
        <h2 class="text-overlay" data-i18n="system">Future University's System</h2>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>


@endsection
