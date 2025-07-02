@extends('layouts.master')
@section('content')          <!-- Front Side -->

       
                <form class="form" method="POST" action="{{route('admin.authenticate')}}">
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
                    <input type="text" name="name" class="form-control form-control-sm" id="staffemail" placeholder="" required>

                    <label for="exampleFormControlInput1" class="form-label"
                    style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                    data-i18n="username">email</label>
                    <input type="email" name="email" class="form-control form-control-sm" id="staffemail" placeholder="" required>

                <br/>
                    
                    <div class="form-group mb-3">
                        <label for="address-wpalaceholder">Select Kind Of Education</label>
                          <select class="form-control" name="role" id="example-select">
                            <option value="">select role</option>
                              @foreach ($role as $roles)
                              <option value="{{$roles->id}}">{{$roles->name}}</option>  
                              @endforeach
                            </select>
                      </div>
                    <br/>
                    <label for="inputPassword5" class="form-label"
                        style="color: #B77848;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="password">Password</label>
                    <input  name ="password" type="password" id="staffpassword" class="form-control form-control-sm"
                        aria-describedby="passwordHelpBlock" required>

                    <a href="#" class="href link"
                        style="color: #B77848; font-size: 12px;align-items: flex-end;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                        data-i18n="forgot">Forgot password</a>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="active" id="gridCheck">
                            <label class="form-check-label" for="gridCheck"
                                style="color: #6C3A30; font-size: 12px;margin-bottom: 20px;user-select: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;"
                                data-i18n="remember">
                                active
                            </label>
                        </div>
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





      <div class="img-container col-8 g-0 d-none d-md-block">
        <img src="assets/paintinglogin2.svg" alt="..." draggable="false">
        <h2 class="text-overlay" data-i18n="welcomecampus">Welcome to One Campus</h2>
      </div>

    </div>
  </div>
 

@endsection