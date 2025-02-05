@extends('layouts.master')
@section('content')

    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
              <a class="nav-link {{ request()->is('admin/role/list') ? 'active' : ''}}" href="{{route('admin.role.list')}}" data-page="roles">Roles</a>
              <a class="nav-link {{ request()->is('admin/role/dept') ? 'active' : ''}}" href="{{route('admin.role.dept')}}" data-page="department">Departments</a>
              <a class="nav-link {{ request()->is('admin/role/branch') ? 'active' : ''}}" href="{{route('admin.role.branch')}}" data-page="branches">Branches</a>
              <a class="nav-link {{ request()->is('admin/role/identity') ? 'active' : ''}}" href="{{route('admin.role.identity')}}" data-page="identity">Identity Attributes</a>
        
            </div>
          </div>
        </div>
      </nav>
<div class="">
    
    <div class="row">
        <div class="col-4">
          <h2>Branches :</h2>
        </div>
        <div class="col-4">
          <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#AddBranch"> <img src="{{asset('assets/icons/add.svg')}}" alt="add"> </button>
        </div>
       
      </div>

    <div class="">
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
                    <th style="text-align: center;">Country</th>
                    <th style="text-align: center;">City</th>
                    <th style="text-align: center;">Address</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                    <td style="text-align: center;">Khartoum Branch</td>
                    <td style="text-align: center;">فرع الخرطوم</td>
                    <td style="text-align: center;">Sudan</td>
                    <td style="text-align: center;">Khartoum</td>
                    <td style="text-align: center;">Africa Street - Khartoum, Sudan</td>
                    <td style="text-align: center;"> 
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditBranch">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
  </div>




<!-- Popup Edit Form -->
<div class="modal fade" id="EditBranch" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Branch</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Branch Name (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Branch Name (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
            <!-- Emails -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Country</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the Country.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">City</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the City.</div>
              </div>
            </div>
            <!-- Phone Numbers -->
            <div class="row mb-3">
              <div class="col-md-4" > 
                <label for="fullNameEnglish" class="form-label">Address</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the Address.</div>
              </div>
              
            </div> 
             <button type="submit" class="btn btn-outline w-100">Submit</button>
          </form>
        </div>
      </div>
  
      
    </div>
  </div>
  
  
<!-- Popup Edit Form -->
<div class="modal fade" id="AddBranch" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Add Branch</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Branch Name (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Branch Name (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
            <!-- Emails -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Country</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the Country.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">City</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the City.</div>
              </div>
            </div>
            <!-- Phone Numbers -->
            <div class="row mb-3">
              <div class="col-md-4" > 
                <label for="fullNameEnglish" class="form-label">Address</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the Address.</div>
              </div>
              
            </div> 
             <button type="submit" class="btn btn-outline w-100">Submit</button>
          </form>
        </div>
      </div>
  
      
    </div>
  </div>

@endsection