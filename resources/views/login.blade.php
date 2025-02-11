<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneCampus:: In Development</title>

    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/campuslogin.css">

</head>

<body>
    <picture>
        <source srcset="/public/assets/logowithname.svg" type="image/svg+xml">
        <img src="/public/assets/logowithname.svg" class="logo" alt="logo" draggable="false">
    </picture>

    <!-- Top-left image -->
    <img src="/public/assets/bottomleft.svg" class="bottom-left" alt="bottomleft" draggable="false">
    <!-- Bottom-right image -->
    <img src="/public/assets/topright.svg" class="top-right" alt="topright" draggable="false">
    <!-- Form Container -->

    <div class="container col-12" style="flex-direction: row;">
        <div class="row g-0 col-12">
            <div class="left-form col-4 p-4 align-content-center">
                <div class="row" style="justify-content: end;align-items: end;align-self: flex-end;">
                    <div class="radio-dropdown">
                        <i class="bi bi-globe" style="font-size: 0.9rem;color: #6C3A30;"></i>
                        <div class="dropdown-menu">
                            <div class="radio-item">
                                <input type="radio" id="english" name="language" value="en" class="radio-input"
                                    checked>
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
                </div>

                <!-- Front Side -->

                <form class="form" method="POST" action="{{ route('admin.role') }}">
                    @csrf
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
                    <input type="text" name="name" class="form-control form-control-sm" id="staffemail"
                        placeholder="" value="{{ Auth::user()->name ?? '' }}" required>

                    <label for="inputPassword5" class="form-label"
                        style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="password">Password</label>
                    <input type="password" name="password" id="staffpassword" class="form-control form-control-sm"
                        aria-describedby="passwordHelpBlock" required>

                    <a href="#" class="forgot-password-link" data-i18n="forgot" style="justify-self: end;">Forgot
                        password?</a>

                    <div class="form-check mt-2">
                        <input class="form-check-input small" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck" data-i18n="remember"
                            style="color: #6C3A30; font-size: 12px;">
                            Remember my username
                        </label>
                    </div>
                    <button type="submit" id="studentLogin" class="btn btn-outline mt-3" data-i18n="login"
                        style="width: 220px;margin-top: 10px;">Login</button>
                </form>
            </div>
            <div class="img-container col-8 g-0 d-none d-md-block">
                <img src="/public/assets/paintinglogin2.svg" alt="..." draggable="false">
                <h2 class="text-overlay" data-i18n="welcomecampus">Welcome to One Campus</h2>
            </div>
        </div>
    </div>
</body>
</html>
