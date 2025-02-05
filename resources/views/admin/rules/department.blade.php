@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
              <a class="nav-link {{ request()->is('admin/rule/list') ? 'active' : ''}}" href="{{route('admin.rule.list')}}" data-page="roles">Rules</a>
              <a class="nav-link {{ request()->is('admin/rule/dept') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Departments</a>
              <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : ''}}" href="{{route('admin.rule.branch')}}" data-page="branches">Branches</a>
              <a class="nav-link {{ request()->is('admin/rule/identity') ? 'active' : ''}}" href="{{route('admin.rule.identity')}}" data-page="identity">Identity Attributes</a>
        </div>
          </div>
        </div>
      </nav>
    <div class="">
      <div class="row">
        <div class="col-4">
          <h2>Faculties :</h2>
        </div>
        <div class="col-4">
          <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#Addfaculty"> <img src="{{asset('assets/icons/add.svg')}}" alt="add"> </button>
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
                    <th style="text-align: center;">Name (English)</th>
                    <th style="text-align: center;">Name (Arabic)</th>
                    <th style="text-align: center;">Abbreviation</th>
                    <th style="text-align: center;">branch</th>
                    <th style="text-align: center;">status</th>
                    <th style="text-align: center;">Edit</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                    <td style="text-align: center;">Information Technology</td>
                    <td style="text-align: center;">تقنية المعلومات</td>
                    <td style="text-align: center;">IT</td>
                    <td style="text-align: center;">All Branches</td>
                    <td style="text-align: center; justify-items: center; align-items: center;" >
                        <div class="outerDivFull" >
                            <div class="switchToggle">
                                <input type="checkbox" id="switch" style="width: 30vw;">
                                <label for="switch">Toggle</label>
                            </div>
                            
                            
                            
                            </div>
                            
                      
                </td>
                    <td style="text-align: center;"> 
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditFac">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
  </div>
  
  <div class="modal fade" id="EditFac" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Add Faculty</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Faculty Name (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Faculty Name (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
            <!-- Emails -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Abbreviation</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the Abbreviation.</div>
              </div>
              <div class="col-md-6"> <label for="department" class="form-label">Branch</label> 
                  
                <select class="form-select" id="dep" required>
                <option value="">Select Branch </option>
                <option value="Chairman">All</option>
                <option value="President">Khartoum</option>
                <option value="VPAA">Egypt</option>
                
            </select>
                <div class="invalid-feedback">Please select a Branch.</div>
              </div>
                
            </div>
            <!-- Phone Numbers -->
             <div class="row align-content-center justify-content-center">
              <button type="submit" class="btn btn-outline w-50">Submit</button>
             </div>
             
          </form>
        </div>
      </div>
  
      
    </div>
  </div>
  <div class="modal fade" id="Addfaculty" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" s>
    <div class="modal-dialog" role="document" style="width: 50vw;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Faculty</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row needs-validation" novalidate> <!-- Full Name -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Faculty Name (Arabic)</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the name in Arabic.</div>
              </div>
              <div class="col-md-6" > <label for="fullNameEnglish" class="form-label">Faculty Name (English)</label>
                <input type="text" class="form-control" id="fullNameEnglish" required>
                <div class="invalid-feedback">Please enter the name in English.</div>
              </div>
            </div> 
            <!-- Emails -->
            <div class="row mb-3">
              <div class="col-md-6"> <label for="fullNameArabic" class="form-label">Abbreviation</label>
                <input type="text" class="form-control" id="fullNameArabic" required>
                <div class="invalid-feedback">Please enter the Abbreviation.</div>
              </div>
              <div class="col-md-6"> <label for="department" class="form-label">Branch</label> 
                  
                <select class="form-select" id="dep" required>
                <option value="">Select Branch </option>
                <option value="Chairman">All</option>
                <option value="President">Khartoum</option>
                <option value="VPAA">Egypt</option>
                
            </select>
                <div class="invalid-feedback">Please select a Branch.</div>
              </div>
                
            </div>
            <!-- Phone Numbers -->
             <div class="row align-content-center justify-content-center">
              <button type="submit" class="btn btn-outline w-50">Submit</button>
             </div>
             
          </form>
        </div>
      </div>
  
      
    </div>
  </div>
@endsection


  
