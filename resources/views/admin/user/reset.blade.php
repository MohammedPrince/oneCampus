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

    <div class="form-container" style="background-color: #fff; border-radius: 20px; box-shadow: 0 0 20px rgba(51, 51, 51, 0.137); padding: 20px;">
        <form class="needs-validation" novalidate action="{{ route('user.reset.password') }}" method="POST">
            @csrf
            <div class="col justify-content-center align-content-center">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 for="userid" class="form-label" style="margin-bottom: 2vh;"> Enter User ID</h5>
                        <input type="text" class="form-control" name="user_id" required>
                        <div class="invalid-feedback">Please enter the User Id.</div>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-outline" style="width: 200px; margin-left: 13vw">Reset Password</button>
                </div>
            </div>
        </form>

        <!-- Display Success/Error messages -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
