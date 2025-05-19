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

    <div class="row nav-tabs" id="userOptionsTab" role="tablist" style="border: none; width: 30vw;">
        <a class="nav-links active" id="single-user-tab" data-bs-toggle="tab" href="#single-user" role="tab"
          aria-controls="single-user" aria-selected="true">Single User</a>
  
        <a class="nav-links" id="bulk-user-tab" data-bs-toggle="tab" href="#bulk-user" role="tab"
          aria-controls="bulk-user" aria-selected="false">Add Bulk</a>
    </div>  

    <div class="tab-content mt-4">
        <!-- Single User Form -->
        <div class="tab-pane fade show active" id="single-user" role="tabpanel" aria-labelledby="single-user-tab">
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h1 class="mb-4">Add New Employee</h1>
                <form method="POST" action="{{ route('employee.store') }}" class="row needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="fullNameArabic" class="form-label">Full Name (Arabic)</label>
                          <input type="text" class="form-control" id="full_name_ar" name="full_name_ar" required>
                          <div class="invalid-feedback">Please enter the full name in Arabic.</div>
                      </div>      
                        <div class="col-md-6">
                            <label for="fullNameEnglish" class="form-label">Full Name (English)</label>
                            <input type="text" class="form-control" id="full_name_en" name="full_name_en" required>
                            <div class="invalid-feedback">Please enter the full name in English.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="personalEmail" class="form-label">Personal Email</label>
                            <input type="email" class="form-control" id="personal_email" name="personal_email" required>
                            <div class="invalid-feedback">Please enter a valid personal email.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="corporateEmail" class="form-label">Corporate Email</label>
                            <input type="email" class="form-control" id="corporate_email" name="corporate_email" required>
                            <div class="invalid-feedback">Please enter a valid corporate email.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="whatsAppNumber" class="form-label">WhatsApp Number</label>
                            <input type="tel" class="form-control" id="whatsapp_number" name="whatsapp_number" required>
                            <div class="invalid-feedback">Please enter a valid WhatsApp number.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="dep" name="department_id" required style="width: 30vw;">
                                <option value="">Select your Department</option>
                                 @if(isset($faculties) && $faculties->isNotEmpty())
                                @foreach ($faculties as $data )
                                <option value="{{$data->faculty_id}}">{{$data->faculty_name_en}}</option>
                                @endforeach
                                @else
                                    <option>No Faculty available</option>
                                @endif       
                            </select>
                            <div class="invalid-feedback">Please select a department.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required style="width: 30vw;">
                                <option value="">Select your role</option>
                                @if(isset($roles) && $roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                @else
                                    <option>No roles available</option>
                                @endif                    
                            </select>
                            <div class="invalid-feedback">Please select a role.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                            <div class="invalid-feedback">Please select a birth date.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="recruitmentDate" class="form-label">Recruitment Date</label>
                            <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                            <div class="invalid-feedback">Please select a recruitment date.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="identificationType" class="form-label">Identification Type</label>
                            <select class="form-control" id="identification_type" name="identification_type" required>
                                <option value="NationalID"selected>National ID</option>
                                <option value="Passport">Passport</option>
                                <option value="Driving License">Driving License</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select an identification type.</div>     </div>
                        <div class="col-md-4">
                            <label for="identificationNumber" class="form-label" id="identificationLabel">National ID</label>
                            <input type="text" class="form-control" id="identification_id" name="identification_id" required>
                            <div class="invalid-feedback">Please enter an identification number.</div>  </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="branch" class="form-label">Branch</label>
                            <select class="form-select" id="branch_id" name="branch_id" required style="width: 30vw;">
                            <option value="">Select Branch</option>
                           @if(isset($branches) && $branches->isNotEmpty())
                            @foreach($branches as $branch)
                            <option value="{{ $branch->branch_id }}">{{ $branch->branch_name_en }}</option>
                            @endforeach
                            @else
                                <option>No Branch available</option>
                            @endif       
                        </select>                            
                        <div class="invalid-feedback">Please enter the branch.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="biometric" class="form-label">Biometric</label>
                            <input type="text" class="form-control" id="biometric" name="biometric" required>
                            <div class="invalid-feedback">Please enter the biometric details.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required style="width: 30vw;">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="invalid-feedback">Please select a gender.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required>
                            <div class="invalid-feedback">Please enter a nationality.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cv" class="form-label">CV</label>
                            <input type="file" class="form-control" id="cv" name="cv" required>
                            <div class="invalid-feedback">Please upload a CV.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="certificates" class="form-label">Certificates</label>
                            <input type="file" class="form-control" id="certificates" name="certificates" required>
                            <div class="invalid-feedback">Please upload certificates.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline w-100">Submit</button>
                </form>
            </div>
        </div>

        <!-- Bulk User Form -->
        <div class="tab-pane fade" id="bulk-user" role="tabpanel" aria-labelledby="bulk-user-tab">
            <div class="container">
                <h1 class="mb-4">Bulk User Upload</h1>
                <!-- Bulk Upload Form -->
                <form action="{{ route('employees.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bulkUploadFile" class="form-label">Upload CSV</label>
                        <input type="file" class="form-control w-50" id="bulkUploadFile" name="bulk_file" style="text-align: center; vertical-align: middle; padding-bottom: 4vh;" required>
                        <div class="invalid-feedback">Please upload a CSV file.</div>
                    </div>

                    <button type="submit" class="btn btn-outline w-50">Upload Users</button>
                </form>
            </div>
        </div>
    </div>  
    

@endsection

