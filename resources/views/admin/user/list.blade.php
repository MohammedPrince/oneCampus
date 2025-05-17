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
    <div class="container mt-4">
        <h1>Employee List</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name (Arabic)</th>
                    <th>Full Name (English)</th>
                    <th>Personal Email</th>
                    <th>Corporate Email</th>
                    <th>Phone Number</th>
                    <th>WhatsApp Number</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>CV</th>
                    <th>Certificate</th>
                    <th>Birth Date</th>
                    <th>Recruitment Date</th>
                    <th>Passport Number</th>
                    <th>National ID</th>
                    <th>Branch</th>
                    <th>Biometric</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                 
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->full_name_ar }}</td>
                        <td>{{ $employee->full_name_en }}</td>
                        <td>{{ $employee->personal_email }}</td>
                        <td>{{ $employee->corporate_email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->profile->whatsapp_number }}</td>
                        <td>{{ $employee->department->faculty_name_en }}</td>
                        <td>
                          @if ($employee->profile && $employee->profile->roleInfo)
                              {{ $employee->profile->roleInfo->name }}
                          @else
                              {{ 'No Role Assigned' }}
                          @endif
                      </td>                        <td>
                            @if($employee->profile->cv)
                                <a href="{{ asset('storage/' . $employee->profile->cv) }}" target="_blank">View CV</a>
                            @else
                                No CV uploaded
                            @endif
                        </td>
                        <td>
                            @if($employee->profile->certificates)
                                <a href="{{ asset('storage/' . $employee->profile->certificates) }}" target="_blank">View Certificate</a>
                            @else
                                No Certificate uploaded
                            @endif
                        </td>
                        <td>{{ $employee->profile->date_of_birth }}</td>
                        <td>{{ $employee->profile->hire_date }}</td>
                        <td>{{ $employee->profile->identification_id }}</td>
                        <td>{{ $employee->profile->identification_id_type  }}</td>
                        <td>{{ $employee->branch->branch_name_en }}</td>
                        <td>{{ $employee->profile->biometric }}</td>
                        <td>{{ $employee->profile->gender }}</td>
                        <td>{{ $employee->profile->nationality }}</td>
                        <td>
                            <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#editModal" 
                                    data-id="{{ $employee->employee_id }}"
                                    data-full_name_arabic="{{ $employee->full_name_ar }}"
                                    data-full_name_english="{{ $employee->full_name_en }}"
                                    data-personal_email="{{ $employee->personal_email }}"
                                    data-corporate_email="{{ $employee->corporate_email }}"
                                    data-phone_number="{{ $employee->phone_number }}"
                                    data-whatsapp_number="{{ $employee->profile->whatsapp_number }}"
                                    data-department="{{ $employee->department_id }}"
                                    data-role="{{ $employee->profile->role }}"
                                    data-birth_date="{{ $employee->profile->date_of_birth ? \Carbon\Carbon::parse($employee->profile->date_of_birth)->format('Y-m-d') : '' }}"
                                    data-recruitment_date="{{ $employee->profile->hire_date ? \Carbon\Carbon::parse($employee->profile->hire_date)->format('Y-m-d') : '' }}"
                                    data-identification_type="{{ $employee->profile->identification_id_type }}"
                                    data-identification_id="{{ $employee->profile->identification_id }}"
                                    data-branch="{{ $employee->branch_id }}"
                                    data-biometric="{{ $employee->profile->biometric }}"
                                    data-gender="{{ $employee->profile->gender }}"
                                    data-nationality="{{ $employee->profile->nationality }}"
                                    data-cv="{{ $employee->profile->cv }}"
                                    data-certificate="{{ $employee->profile->certificates }}">
                                    <img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit">

                            </button>
                                             <!-- Show Button -->
                 <a href="{{ route('user.show', $employee->employee_id) }}"  style="border: none; background-color: transparent;"><img src="{{ asset('assets/icons/eye.svg') }}" alt="Edit">
                 </a>

                  <!-- Delete Form -->
                  <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this employee?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="border: none; background-color: transparent;" class=""><img src="{{ asset('assets/icons/trash-fill (1).svg') }}" alt="Edit"></button>
                  </form>
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
              <form class="row needs-validation" method="POST" action="" id="editEmployeeForm" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editEmployeeId">
      
                <!-- Full Names -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editFullNameArabic" class="form-label">Full Name (Arabic)</label>
                    <input type="text" class="form-control" id="editFullNameArabic" name="full_name_ar" required>
                    <div class="invalid-feedback">Please enter the full name in Arabic.</div>
                  </div>
                  <div class="col-md-6">
                    <label for="editFullNameEnglish" class="form-label">Full Name (English)</label>
                    <input type="text" class="form-control" id="editFullNameEnglish" name="full_name_en" required>
                    <div class="invalid-feedback">Please enter the full name in English.</div>
                  </div>
                </div>
      
                <!-- Emails -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editPersonalEmail" class="form-label">Personal Email</label>
                    <input type="email" class="form-control" id="editPersonalEmail" name="personal_email" required>
                    <div class="invalid-feedback">Please enter a valid personal email.</div>
                  </div>
                  <div class="col-md-6">
                    <label for="editCorporateEmail" class="form-label">Corporate Email</label>
                    <input type="email" class="form-control" id="editCorporateEmail" name="corporate_email" required>
                    <div class="invalid-feedback">Please enter a valid corporate email.</div>
                  </div>
                </div>
      
                <!-- Phone Numbers -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editPhoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="editPhoneNumber" name="phone_number" required>
                  </div>
                  <div class="col-md-6">
                    <label for="editWhatsAppNumber" class="form-label">WhatsApp Number</label>
                    <input type="tel" class="form-control" id="editWhatsAppNumber" name="whatsapp_number" required>
                  </div>
                </div>
      
                <!-- Department and Role -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="editDepartment" class="form-label">Department</label>
                    <input type="text" class="form-control" id="editDepartment" name="department_id" required>
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
                    <input type="date" class="form-control" id="editBirthDate" name="birth_date" required>
                  </div>
                  <div class="col-md-6">
                    <label for="editRecruitmentDate" class="form-label">Recruitment Date</label>
                    <input type="date" class="form-control" id="editRecruitmentDate" name="hire_date" required>
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
                    <input type="text" class="form-control" id="editBiometric" name="biometric" required>
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
                  </div>
                  <div class="col-md-6">
                    <label for="editNationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="editNationality" name="nationality" required>
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
                    <input type="text" class="form-control" id="editidentification_id" name="identification_id" required>
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
                    <div class="col-md-6">
                    <label for="editCertificate" class="form-label">Certificates</label>
                    <input type="file" class="form-control" id="editCertificate" name="certificates">
                    <p class="mt-2">Current Certificate: <span id="currentCertificate"></span></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Save Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var editModal = document.getElementById('editModal');
      if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget;
  
          // Getting all values
          var employeeId = button.getAttribute('data-id');
          var fullNameArabic = button.getAttribute('data-full_name_arabic');
          var fullNameEnglish = button.getAttribute('data-full_name_english');
          var personalEmail = button.getAttribute('data-personal_email');
          var corporateEmail = button.getAttribute('data-corporate_email');
          var phoneNumber = button.getAttribute('data-phone_number');
          var whatsappNumber = button.getAttribute('data-whatsapp_number');
          var department = button.getAttribute('data-department');
          var role = button.getAttribute('data-role');
          var birthDate = button.getAttribute('data-birth_date');
          var recruitmentDate = button.getAttribute('data-recruitment_date');
          var identificationType = button.getAttribute('data-identification_type');
          var identificationId = button.getAttribute('data-identification_id');
          var branch = button.getAttribute('data-branch');
          var biometric = button.getAttribute('data-biometric');
          var gender = button.getAttribute('data-gender');
          var Nationality = button.getAttribute('data-nationality');
          var cv = button.getAttribute('data-cv');
          var certificate = button.getAttribute('data-certificate');
  
          // Assign values to modal form
          document.getElementById('editEmployeeId').value = employeeId;
          document.getElementById('editFullNameArabic').value = fullNameArabic;
          document.getElementById('editFullNameEnglish').value = fullNameEnglish;
          document.getElementById('editPersonalEmail').value = personalEmail;
          document.getElementById('editCorporateEmail').value = corporateEmail;
          document.getElementById('editPhoneNumber').value = phoneNumber;
          document.getElementById('editWhatsAppNumber').value = whatsappNumber;
          document.getElementById('editDepartment').value = department;
          document.getElementById('editidentification_id').value = identificationId;
          document.getElementById('editidentification_type').value = identificationType.toLowerCase();
          document.getElementById('editRole').value = role;
          document.getElementById('editBirthDate').value = birthDate;
          document.getElementById('editRecruitmentDate').value = recruitmentDate;
          document.getElementById('editBranch').value = branch;
          document.getElementById('editBiometric').value = biometric;
          document.getElementById('editGender').value = gender.toLowerCase();
          document.getElementById('editNationality').value = Nationality;
 

          console.log('Raw Identification Type:', identificationType); // Debugging

        // Set identification type and move to top
        var $select = $('#editidentification_type');
        var selectedValue = identificationType.trim();

        // Find and select the option, then move it to the top
        var $selectedOption = $select.find('option').filter(function () {
          return $(this).val().trim().toLowerCase() === selectedValue.toLowerCase();
        });

        if ($selectedOption.length) {
          $selectedOption.prop('selected', true);
          $selectedOption.detach();
          $select.prepend($selectedOption);
        }

        // Update label for identification
        $('#identificationLabel').text(selectedValue);

          document.getElementById('currentCV').innerText = cv ? cv : 'No CV uploaded';
          document.getElementById('currentCertificate').innerText = certificate ? certificate : 'No Certificate uploaded';
          console.log('Identification Type:', identificationType);

          $('#editEmployeeForm').attr('action', '{{ url('admin/user') }}/' + employeeId);
        });
      }


      // Label update on dropdown change
      $('#editidentification_type').on('change', function () {
          $('#identificationLabel').text($(this).val());
      });
    });
  </script>
  @endsection



