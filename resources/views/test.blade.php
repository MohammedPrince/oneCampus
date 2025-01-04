<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Campus::Development Enviromint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/fu_logo.png') }}" rel="shortcut icon" />

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
    <picture>
        <source srcset="{{ asset('assets/logowithname.svg') }}" type="image/svg+xml">
        <img src="{{ asset('assets/logowithname.svg') }}" class="logo" alt="Logo">
    </picture>
    <picture>
        <source srcset="{{ asset('assets/bottomleft.svg') }}" type="image/svg+xml">
        <img src="{{ asset('assets/bottomleft.svg') }}" class="bottom-left" alt="Bottom Left">
    </picture>
    {{-- <picture>
        <source srcset="{{ asset('assets/topright.svg') }}" type="image/svg+xml">
        <img src="{{ asset('assets/topright.svg') }}" class="top-right" alt="Top Right">
    </picture> --}}

    <picture>
        <source srcset="{{ asset('assets/fu_logo.png') }}">
        <img src="{{ asset('assets/fu_logo.png') }}" class="top-right" alt="Top Right">
    </picture>

    <div class="container">
        <div class="row align-items-center min-vh-100" style="justify-content:center;">
            <div class="col-lg-12">
                <!-- <form class="form text-center">
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
        </form> -->
            </div>

            <div class="col-md-6 d-none d-md-block">

                <div class="img-container position-relative">
                    <h4 class="text-center" style="color:#af4f36;">One Campus</h4>
                    <img src="assets/paintinglogin2.svg" alt="Login Illustration" style="border-radius:20px;">

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
