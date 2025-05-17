@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
              <a class="nav-link {{ request()->is('admin/academic/certificate') ? 'active' : ''}}" href="{{route('admin.academic.certificate')}}" id="usersLink" aria-current="page">Certificate</a>
              <a class="nav-link {{ request()->is('admin/academic/major') ? 'active' : ''}}" href="{{route('admin.academic.major')}}" id="addUsersLink">Majors</a>
              <a class="nav-link {{ request()->is('admin/academic/batch') ? 'active' : ''}}" href="{{route('admin.academic.batch')}}" id="resetPasswordsLink">Batches</a>  
              <a class="nav-link {{ request()->is('admin/academic/intake') ? 'active' : ''}}" href="{{route('admin.academic.intake')}}" id="resetPasswordsLink">Intake</a>  

            </div>
          </div>
          </div>
          </nav>  
 
<h2>Certificate Type :</h2>
    <div class="container my-4">
      <!-- Search bar -->
      <div class="mb-3">
        <input
          type="text"
          id="tableSearch"
          class="form-control"
          placeholder="Search..."
          onkeyup="filterTable()"
          style="width: 30vw;"
        />
      </div>

      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                    <th style="text-align: center;">Name (Arabic)</th>
                    <th style="text-align: center;">Name (English)</th>
                   
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                    <td style="text-align: center;">Khartoum Branch</td>
                    <td style="text-align: center;">فرع الخرطوم</td>
                   
                    <td style="text-align: center;"> 
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditCertType">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
    <h2>Certificate Major :</h2>
    <div class="container my-4">
      <!-- Search bar -->
      <div class="mb-3">
        <input
          type="text"
          id="tableSearch2"
          class="form-control"
          placeholder="Search..."
          onkeyup="filterTable2()"
          style="width: 30vw;"
        />
      </div>

      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                    <th style="text-align: center;">Name (Arabic)</th>
                    <th style="text-align: center;">Name (English)</th>
                   
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody2">
                <tr>
                    <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                    <td style="text-align: center;">Khartoum Branch</td>
                    <td style="text-align: center;">فرع الخرطوم</td>
                   
                    <td style="text-align: center;"> 
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditCertMajor">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
    
    <!-- Popup Edit Form -->
<div class="modal fade" id="EditCertType" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw; top: 30vh;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Cirtificate Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Cirtificate Type (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Cirtificate Type (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
           
             <button type="submit" class="btn btn-outline w-100">Submit</button>
          </form>
        </div>
      </div>
  
      
    </div>
  </div>
  
  <div class="modal fade" id="EditCertMajor" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw; top: 30vh;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Cirtificate Major</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Cirtificate Major (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Cirtificate Major (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
           
             <button type="submit" class="btn btn-outline w-100">Submit</button>
          </form>
        </div>
      </div>
  
      
    </div>
  </div>
  

@endsection