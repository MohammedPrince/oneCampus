@extends('layouts.master')

@section('content')

     {{-- <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
                <a class="nav-link {{ request()->is('admin/user/list') ? 'active' : ''}}" href="{{route('user.list')}}" id="usersLink" aria-current="page">Users</a>
                <a class="nav-link {{ request()->is('admin/user/add') ? 'active' : ''}}" href="{{route('user.add')}}" id="addUsersLink">Add Users</a>
                <a class="nav-link {{ request()->is('admin/user/reset') ? 'active' : ''}}" href="{{route('user.reset')}}" id="resetPasswordsLink">Reset Passwords</a>
            </div>
          </div>
        </div>
    </nav> --}}
<div class="container mt-4">



 <div class="card shadow-sm border-0">
     <div class="card-header bg-in text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Employee Details</h5>
        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
            ←Back
        </a>
    </div>
    <div class="card-body">

            <table class="table table-bordered table-striped">
            <thead class="table-light">



 <th style="width: 30%;">البيان / Field</th>
 <th> الموظف / Employee Information</th>
</tr>
</thead>

    </tr>
    <tr >
        <td >Full Name (Arabic)</td>
        <td>{{ $employee->full_name_ar }}</td>

    </tr>
    <tr>
        <td>Full Name (English)</td>
        <td>{{ $employee->full_name_en }}</td>

    </tr>
    <tr>
        <td>Personal Email</td>
        <td>{{ $employee->personal_email }}</td>

    </tr>
    <tr>
        <td>Corporate Email</td>
        <td>{{ $employee->corporate_email }}</td>

    </tr>
    <tr>
        <td>Phone Number</td>
        <td>{{ $employee->phone_number }}</td>

    </tr>
    <tr>
        <td>WhatsApp Number</td>
        <td>{{ $employee->profile->whatsapp_number }}</td>
    </tr>
        <tr>
        <td>Birth Date</td>
        <td>{{ $employee->profile->date_of_birth }}</td>
    </tr>
        <tr>
        <td>Recruitment Date</td>
        <td>{{ $employee->profile->hire_date }}</td>
    </tr>
        <tr>
        <td>Passport Number</td>
        <td>{{ $employee->profile->identification_id_type  }}</td>
    </tr>
        <tr>
        <td>National ID</td>
        <td>{{ $employee->profile->identification_id  }}</td>
    </tr>
        {{-- <tr>
        <td>Branch</td>
        <td>{{ $employee->branch_id }}</td>
    </tr> --}}
        <tr>
        <td>Biometric</td>
        <td>{{ $employee->profile->biometric }}</td>
    </tr>
        <tr>
        <td>Gender</td>
        <td>{{ ucfirst($employee->profile->gender) }}</td>
    </tr>
        <tr>
        <td>Nationality</td>
        <td>{{ $employee->profile->nationality }}</td>
    </tr>

        </tbody>
    </table>
</div>
</div>




    
</div>
@endsection
