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
  <div class="container mt-5">
      <h1 class="mb-4">Add New Employee</h1>
      <form class="row needs-validation" novalidate> <!-- Full Name -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Full Name (Arabic)</label>
            <input type="text" class="form-control" id="fullNameArabic" required>
            <div class="invalid-feedback">Please enter the full name in Arabic.</div>
          </div>
          <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Full Name (English)</label>
            <input type="text" class="form-control" id="fullNameEnglish" required>
            <div class="invalid-feedback">Please enter the full name in English.</div>
          </div>
        </div> <!-- Emails -->
        <div class="row mb-3">
          <div class="col-md-6">
             <label for="personalEmail" class="form-label">Personal Email</label> <input
              type="email" class="form-control" id="personalEmail" required>
            <div class="invalid-feedback">Please enter a valid personal email.</div>
          </div>
          <div class="col-md-6"> <label for="corporateEmail" class="form-label">Corporate Email</label>
            <input type="email" class="form-control" id="corporateEmail" required>
            <div class="invalid-feedback">Please enter a valid corporate email.</div>
          </div>
        </div> <!-- Phone Numbers -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="phoneNumber" class="form-label">Phone Number</label> <input
              type="tel" class="form-control" id="phoneNumber" required>
            <div class="invalid-feedback">Please enter a valid phone number.</div>
          </div>
          <div class="col-md-6"> <label for="whatsAppNumber" class="form-label">WhatsApp Number</label>
            <input type="tel" class="form-control" id="whatsAppNumber" required>
            <div class="invalid-feedback">Please enter a valid WhatsApp number.</div>
          </div>
        </div> <!-- Department and Role -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="department" class="form-label">Department</label> 
            
            <select class="form-select" id="dep" required style=" width: 30vw;
  ">
            <option value="">Select your role</option>
            <option value="Chairman">Chairman</option>
            <option value="President">President</option>
            <option value="VPAA">VPAA</option>
            <option value="APAA">APAA</option>
            <option value="Dean">Dean</option>
            <option value="Assistant Dean">Assistant Dean</option>
            <option value="Faculty Registrar">Faculty Registrar</option>
            <option value="Head of Department">Head of Department</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Teaching Assistant">Teaching Assistant</option>
            <option value="CTS Supervisor">CTS Supervisor</option>
            <option value="CTS Staff">CTS Staff</option>
            <option value="Finance Staff">Finance Staff</option>
            <option value="Guest">Guest</option>
        </select>
            <div class="invalid-feedback">Please select a department.</div>
          </div>
          <div class="col-md-6"> <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" required style=" width: 30vw;">
              <option value="">Select your role</option>
              <option value="Chairman">Chairman</option>
              <option value="President">President</option>
              <option value="VPAA">VPAA</option>
              <option value="APAA">APAA</option>
              <option value="Dean">Dean</option>
              <option value="Assistant Dean">Assistant Dean</option>
              <option value="Faculty Registrar">Faculty Registrar</option>
              <option value="Head of Department">Head of Department</option>
              <option value="Lecturer">Lecturer</option>
              <option value="Teaching Assistant">Teaching Assistant</option>
              <option value="CTS Supervisor">CTS Supervisor</option>
              <option value="CTS Staff">CTS Staff</option>
              <option value="Finance Staff">Finance Staff</option>
              <option value="Guest">Guest</option>
          </select>
            <div class="invalid-feedback">Please select a role.</div>
          </div>
        </div> <!-- Dates -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="birthDate" class="form-label">Birth Date</label> <input
              type="date" class="form-control" id="birthDate" required>
            <div class="invalid-feedback">Please select a birth date.</div>
          </div>
          <div class="col-md-6"> <label for="recruitmentDate" class="form-label">Recruitment Date</label>
            <input type="date" class="form-control" id="recruitmentDate" required>
            <div class="invalid-feedback">Please select a recruitment date.</div>
          </div>
        </div> <!-- Files -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="cv" class="form-label">CV</label> <input type="file"
              class="form-control" id="cv" required>
            <div class="invalid-feedback">Please upload a CV.</div>
          </div>
          <div class="col-md-6"> <label for="certificates" class="form-label">Certificates</label> <input
              type="file" class="form-control" id="certificates" required>
            <div class="invalid-feedback">Please upload certificates.</div>
          </div>
        </div> <!-- Passport and ID -->
        <div class="row mb-3">
          <div class="col-md-4"> <label for="passportNumber" class="">Passport Number</label> <input
              type="text" class="form-control" id="passportNumber" required>
            <div class="invalid-feedback">Please enter a passport number.</div>
          </div>
          <div class="col-md-4"> <label for="nationalId" class="">National ID</label> <input type="text"
              class="form-control" id="nationalId" required>
            <div class="invalid-feedback">Please enter a national ID.</div>
          </div>
        </div> <!-- Branch and Biometric -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="branch" class="form-label">Branch</label> <input type="text"
              class="form-control" id="branch" required>
            <div class="invalid-feedback">Please enter the branch.</div>
          </div>
          <div class="col-md-6"> <label for="biometric" class="form-label">Biometric</label> <input
              type="text" class="form-control" id="biometric" required>
            <div class="invalid-feedback">Please enter the biometric details.</div>
          </div>
        </div> <!-- Gender and Nationality -->
        <div class="row mb-3">
          <div class="col-md-6"> <label for="gender" class="form-label">Gender</label>
             <select
              class="form-select" id="gender" required style=" width: 30vw;">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
   
            </select>
            <div class="invalid-feedback">Please select a gender.</div>
          </div>
          <div class="col-md-6"> <label for="nationality" class="form-label">Nationality</label> <input
              type="text" class="form-control" id="nationality" required>
            <div class="invalid-feedback">Please enter a nationality.</div>
          </div>
        </div> <button type="submit" class="btn btn-outline w-100">Submit</button>
      </form>
    </div>

@endsection

 