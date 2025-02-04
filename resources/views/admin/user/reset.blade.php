@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
              <a class="nav-link {{ request()->is('admin/user/list') ? 'active' : ''}}" href="{{route('user.list')}}" id="usersLink" aria-current="page">Users</a>
              <a class="nav-link {{ request()->is('admin/user/add') ? 'active' : ''}}" href="{{route('user.add')}}" id="addUsersLink">Add Users</a>
              <a class="nav-link {{ request()->is('admin/user/reset') ? 'active' : ''}}" href="{{route('user.reset')}}" id="resetPasswordsLink">Reset Passwords</a>
          </div>
          </div>
        </div>
      </nav> 
      <div class="form-container" style=" background-color: #fff; border-radius: 20px;   box-shadow: 0 0 20px rgba(51, 51, 51, 0.137); padding: 20px;">
        <h3 class="text-md-start mb-4">Reset Password</h3>
        <form class="needs-validation" novalidate>
          <!-- Email Address -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control w-50" id="email" placeholder="Enter your email" required>
            <div class="invalid-feedback">
              Please enter a valid email address.
            </div>
          </div>
    
          <!-- New Password -->
          <div class="mb-3">
            <label for="newPassword" class="form-label">New Password</label>
            <input type="password" class="form-control w-50" id="newPassword" placeholder="Enter new password" required minlength="6">
            <div class="invalid-feedback">
              Password must be at least 6 characters long.
            </div>
          </div>
    
          <!-- Confirm Password -->
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control w-50" id="confirmPassword" placeholder="Confirm your password" required>
            <div class="invalid-feedback">
              Passwords must match.
            </div>
          </div>
    
          <!-- Submit Button -->
          <button type="submit" class="btn btn-outline w-50">Reset Password</button>
        </form>
      </div>
@endsection
