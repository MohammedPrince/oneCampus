@extends('layouts.master')
@section('content')          <!-- Front Side -->

          <form class="form" method="POST" action="{{route('admin.role')}}">
            @csrf
            <figure class="text-center">
              <blockquote class="blockquote">
                <h2
                  style="color: #6C3A30; margin-top: 40px; margin-bottom: 20px;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                  data-i18n="welcomeback">Welcome Back</h2>
              </blockquote>
            </figure>
            <div class="text-overlay"></div>

            <label for="exampleFormControlInput1" class="form-label"
              style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
              data-i18n="username">Username</label>
            <input type="text" class="form-control form-control-sm" id="staffemail" placeholder="" required>

            <label for="inputPassword5" class="form-label"
              style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
              data-i18n="password">Password</label>
            <input type="password" id="staffpassword" class="form-control form-control-sm"
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
        <img src="assets/paintinglogin2.svg" alt="..." draggable="false">
        <h2 class="text-overlay" data-i18n="welcomecampus">Welcome to One Campus</h2>
      </div>

    </div>
  </div>
 

@endsection