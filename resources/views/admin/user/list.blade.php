@extends('layouts.master')

@section('content')

<div id="alertArea" class="my-2"></div>

<nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
  <div class="container-fluid">
    <div class="navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav justify-content-end w100">
          <a class="nav-link {{ request()->is('admin/user/list') ? 'active' : ''}}" href="{{route('user.list')}}" id="usersLink" aria-current="page">Users</a>
           <a class="nav-link {{ request()->is('admin/user/add') ? 'active' : ''}}" href="{{route('user.add')}}" id="addUsersLink">Add Users</a>
          <a class="nav-link {{ request()->is('admin/user/reset') ? 'active' : ''}}" href="{{route('user.reset')}}" id="resetPasswordsLink">Reset Passwords</a>
      </div>
    </div>
  </div>


</nav>
        <h5 style="margin-top: 40px; margin-left:20px">Employee List</h5>
        @include('layouts.alert')
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name (Arabic)</th>
                    <th>Full Name (English)</th>
                    {{-- <th>Personal Email</th> --}}
                    <th>Email</th>
                    {{-- <th>Phone Number</th> --}}
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Role</th>
                    {{-- <th>CV</th> --}}
                    {{-- <th>Certificate</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                  @php $i = 1; @endphp
                @foreach($employees as $employee)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $employee->full_name_ar }} </td>
                        <td>{{ $employee->full_name_en }}</td>
                        {{-- <td>{{ $employee->personal_email }}</td> --}}
                        <td>{{ $employee->corporate_email }}</td>
                        {{-- <td>{{ $employee->phone_number }}</td> --}}
                        <td>{{ $employee->profile->whatsapp_number ?? '' }}</td>
                        <td>{{ $employee->department->faculty_name_en ?? 'null' }}</td>
                        <td>
                          @if ($employee->profile && $employee->profile->roleInfo)
                              {{ $employee->profile->roleInfo->name }}
                          @else
                              {{ 'No Role Assigned' }}
                          @endif
                      </td>
                      {{-- <td>
                            @if($employee->profile->cv ?? '')
                                <a href="{{ asset('storage/' . $employee->profile->cv) }}" target="_blank">View CV</a>
                            @else
                                No CV uploaded
                            @endif
                        </td> --}}
                        {{-- <td>
                            @if($employee->profile->certificates ?? '')
                                <a href="{{ asset('storage/' . $employee->profile->certificates) }}" target="_blank">View Certificate</a>
                            @else
                                No Certificate uploaded
                            @endif
                        </td> --}}

                        <td>
                            <div class="d-flex gap-1">
                            <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editModal"
                                    data-id="{{ $employee->employee_id }}"
                                    data-full_name_arabic="{{ $employee->full_name_ar }}"
                                    data-full_name_english="{{ $employee->full_name_en }}"
                                    data-personal_email="{{ $employee->personal_email }}"
                                    data-corporate_email="{{ $employee->corporate_email }}"
                                    data-phone_number="{{ $employee->phone_number }}"
                                    data-whatsapp_number="{{ $employee->profile->whatsapp_number ?? '' }}"
                                    data-department_id="{{ $employee->department->faculty_id ?? 'null'}}"
                                    data-role="{{ $employee->profile->role ?? '' }}"
                                    data-birth_date="{{ optional($employee->profile)->date_of_birth ? \Carbon\Carbon::parse($employee->profile->date_of_birth)->format('Y-m-d') : '' }}"
                                    data-recruitment_date="{{ optional($employee->profile)->hire_date ? \Carbon\Carbon::parse($employee->profile->hire_date)->format('Y-m-d') : '' }}"
                                    data-identification_type="{{ $employee->profile->identification_id_type ?? '' }}"
                                    data-identification_id="{{ $employee->profile->identification_id ?? ' ' }}"
                                    data-branch_id="{{ $employee->branch->branch_id ?? 'null'}}"
                                    data-biometric="{{ $employee->profile->biometric ?? ''}}"
                                    data-gender="{{ $employee->profile->gender ?? '' }}"
                                    data-nationality="{{ $employee->profile->nationality ?? '' }}"
                                    data-cv="{{ $employee->profile->cv ?? '' }}"
                                    data-certificate="{{ $employee->profile->certificates ?? '' }}">
                                    <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
                            </button>
                                             <!-- Show Button -->
                 <a href="{{ route('user.show', $employee->employee_id) }}"  style="border: none; background-color: transparent;"><img src="{{ asset('assets/icons/eye.svg') }}" class="action-icon" alt="Edit">
                 </a>
                  <!-- Delete Form -->
                  <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this employee?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="border: none; background-color: transparent;" class=""><img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Edit"></button>
                  </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <form class="row needs-validation" method="POST" action="" id="editEmployeeForm" enctype="multipart/form-data" novalidate> --}}
                {{-- admin/user --}}
                <form action="{{ route('user.update', $employee->employee_id ) }}" method="POST"  enctype="multipart/form-data" >
                {{-- <form action="{{ route('employee.update', $employee->employee_id) }}" method="POST" id="editEmployeeForm" enctype="multipart/form-data" class="row needs-validation" novalidate> --}}
                @csrf
                {{-- @method('PUT') --}}
                <input type="hidden" name="id" id="editEmployeeId">

                <!-- Full Names -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editFullNameArabic" class="form-label">Full Name (Arabic)</label>
                    <input type="text" class="form-control @error('full_name_ar') is-invalid @enderror" id="editFullNameArabic" name="full_name_ar" required>
                      @error('full_name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter the full name in Arabic.</div>
                  </div>


                  <div class="col-md-6">
                    <label for="editFullNameEnglish" class="form-label">Full Name (English)</label>
                    <input type="text" class="form-control @error('full_name_en') is-invalid @enderror" id="editFullNameEnglish" name="full_name_en" required>
                      @error('full_name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter the full name in English.</div>
                  </div>
                </div>

                <!-- Emails -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editPersonalEmail" class="form-label ">Personal Email</label>
                    <input type="email" class="form-control @error('personal_email') is-invalid @enderror" id="editPersonalEmail" name="personal_email" required>
                      @error('personal_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a valid personal email.</div>
                  </div>


                  <div class="col-md-6">
                    <label for="editCorporateEmail" class="form-label">Corporate Email</label>
                    <input type="email" class="form-control @error('corporate_email') is-invalid @enderror" id="editCorporateEmail" name="corporate_email" required>
                      @error('corporate_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a valid corporate email.</div>
                  </div>
                </div>

                <!-- Phone Numbers -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editPhoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
       id="editPhoneNumber" name="phone_number"
       pattern="\d*" inputmode="numeric" required>

                      @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                  </div>


                  <div class="col-md-6">
                    <label for="editWhatsAppNumber" class="form-label">WhatsApp Number</label>
                    <input type="tel" class="form-control @error('whatsapp_number') is-invalid @enderror"  pattern="\d*" inputmode="numeric" id="editWhatsAppNumber" name="whatsapp_number" required>
                      @error('whatsapp_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a valid WhatsApp number.</div>
                  </div>
                </div>

                <!-- Department and Role -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editDepartment" class="form-label">Department</label>
                   <select class="form-select" id="editDepartment" name="department_id" required>
                                @php
                                    $faculties = App\Models\Faculty::all();
                                @endphp
                                @foreach ($faculties as $data )
                                <option value="{{$data->faculty_id}}">{{$data->faculty_name_en}}</option>
                                @endforeach

                            </select>
                  </div>
                  <div class="col-md-6">
                    <label for="editRole" class="form-label">Role</label>
                    <select class="form-select" id="editRole" name="role" required>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Dates -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editBirthDate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="editBirthDate" name="birth_date" required>
                        @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    <div class="invalid-feedback">Please enter the birth date.</div>
                  </div>

                  <div class="col-md-6">
                    <label for="editRecruitmentDate" class="form-label">Recruitment Date</label>
                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" id="editRecruitmentDate" name="hire_date" required>
                      @error('hire_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter the recruitment date.</div>
                  </div>
                </div>


                <!-- Branch & Biometric -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editBranch" class="form-label">Branch</label>
                      <select class="form-select" id="editBranch" name="branch_id" required style="width: 30vw;">
                            <option value="">Select Branch</option>
                            @php
                                $branches = App\Models\Branch::all();
                            @endphp
                            @foreach($branches as $branch)
                            <option value="{{ $branch->branch_id }}">{{ $branch->branch_name_en }}</option>
                            @endforeach
                        </select>
                  </div>


                  <div class="col-md-6">
                    <label for="editBiometric" class="form-label">Biometric</label>
                    <input type="text" class="form-control @error('biometric') is-invalid @enderror" id="editBiometric" name="biometric" required>
                      @error('biometric')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a biometric number.</div>
                  </div>
                </div>

                <!-- Gender & Nationality -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editGender" class="form-label">Gender</label>
                    <select class="form-select" id="editGender" name="gender" required>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                    <div class="invalid-feedback">Please select a gender.</div>
                  </div>


                  <div class="col-md-6">
                    <label for="editNationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="editNationality" name="nationality" required>
                      @error('nationality')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter a nationality.</div>
                  </div>
                </div>

                            <!-- Identification Fields -->
                <div class="row mb-3">
                    <div class="col-md-4">
                    <label for="identificationType" class="form-label">Identification Type</label>
                    <select class="form-control" id="editidentification_type" name="identification_type" required>
                        <option value="National ID">National ID</option>
                        <option value="Passport">Passport</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback">Please select an identification type.</div>
                    </div>

                    <div class="col-md-4">
                    <label for="identification_id" class="form-label" id="identificationLabel">National ID</label>
                    <input type="text" class="form-control @error('identification_id') is-invalid @enderror" id="editidentification_id" name="identification_id" required>
                      @error('identification_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    <div class="invalid-feedback">Please enter an identification number.</div>
                    </div>
                </div>
                <!-- File Uploads -->
                <div class="row mb-3">
                    <div class="col-md-6">
                    <label for="editCV" class="form-label">CV</label>
                    <input type="file" class="form-control" id="editCV" name="cv">
                    <p class="mt-2">Current CV: <span id="currentCV"></span></p>
                    </div>
                     </div>
                    <div class="row mb-3">
                    <div class="col-md-6">
                    <label for="editCertificate" class="form-label">Certificates</label>
                    <input type="file" class="form-control" id="editCertificate" name="certificates">
                    <p class="mt-2">Current Certificate: <span id="currentCertificate"></span></p>
                    </div>
                </div>
                <center>
                <button type="submit" class="btn btn-outline-primary w-50">Submit</button>

                </center>
              </form>
            </div>
          </div>
        </div>
      </div>


@endsection




