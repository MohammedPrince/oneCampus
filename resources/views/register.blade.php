<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OneCampus - Register</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/campuslogin.css') }}">
</head>

<body style="margin: 0; padding: 0; height: 100vh; overflow: hidden;">
  <picture>
    <source srcset="{{asset('assets/logowithname.svg')}}" type="image/svg+xml">
    <img src="{{asset('assets/logowithname.svg')}}" class="logo" alt="logo" draggable="false">
  </picture> 
  <img src="{{ asset('assets/bottomleft.svg') }}" class="bottom-left" alt="bottomleft" draggable="false">
  <img src="{{ asset('assets/topright.svg') }}" class="top-right" alt="topright" draggable="false">

  <div class="container col-12" style="flex-direction: row;">
    <div class="row h-100">
      <!-- Alert Section - Make sure this is properly styled in your CSS -->
      <div class="col-12">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      </div>

      <!-- Scrollable Left Form -->
      <div class="col-md-4 d-flex flex-column" style="background-color: #fff;">
        <!-- Language Dropdown -->
        <div class="p-3 d-flex justify-content-end">
          <div class="radio-dropdown">
            <i class="bi bi-globe" style="font-size: 0.9rem; color: #6C3A30;"></i>
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
        </div>

        <!-- Scrollable form container -->
        <div class="flex-grow-1 overflow-auto px-4 pb-4">
          <form class="form" method="POST" action="{{ route('admin.authenticate') }}">
            @csrf

            <figure class="text-center">
              <blockquote class="blockquote">
                <h2 style="color: #6C3A30; margin-top: 10px; margin-bottom: 10px;" data-i18n="welcomeback">
                  Register New Account
                </h2>
              </blockquote>
            </figure>

            <div class="mb-1">
              <label for="username" class="form-label" style="color: #B77848;" data-i18n="username">Username</label>
              <input type="text" name="name" class="form-control form-control-sm" id="username" value="{{ old('name') }}" required>
            </div>

            <div class="mb-1">
              <label for="email" class="form-label" style="color: #B77848;" data-i18n="email">Email</label>
              <input type="email" name="email" class="form-control form-control-sm" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-1">
              <label for="role">Select Role</label>
              <select class="form-control" name="role" id="role" required>
                <option value="">Select role</option>
                @foreach ($role as $roles)
                  <option value="{{ $roles->id }}" {{ old('role') == $roles->id ? 'selected' : '' }}>{{ $roles->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-1">
              <label for="password" class="form-label" style="color: #B77848;" data-i18n="password">Password</label>
              <input name="password" type="password" id="password" class="form-control form-control-sm" required>
            </div>

            <div class="mb-1">
              <label for="password_confirmation" class="form-label" style="color: #B77848;" data-i18n="confirm_password">Confirm Password</label>
              <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-sm" required>
            </div>

            <button type="submit" class="btn btn-custom w-100" style="margin-top: 10px;" data-i18n="register">
              Register
            </button>
          </form>
        </div>
      </div>

      <!-- Right Image Section -->
      <div class="col-md-8 d-none d-md-block position-relative p-0">
        <img src="{{ asset('assets/paintinglogin2.svg') }}" alt="..." draggable="false" style="width: 100%; height: 100%; object-fit: cover;">
        <h2 class="text-overlay position-absolute top-50 start-50 translate-middle text-white" data-i18n="welcomecampus">
          Welcome to One Campus
        </h2>
      </div>
    </div>
  </div>

  <!-- Add jQuery and Bootstrap JS for alert dismissal -->
  <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>