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
              <a class="nav-link {{ request()->is('admin/rule/departments') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Faculty</a>
              <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : ''}}" href="{{route('admin.rule.branch')}}" data-page="branches">Branches</a>
            </div>
          </div>
          </div>
          </nav>


<div class="container mt-4">

<div class="card shadow-sm border-0">
    <div class="card-header bg-light text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Certificate Type</h5>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
                 <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Name (Arabic)</th>
                    <th style="text-align: center;">Name (English)</th>

                    {{-- <th style="text-align: center;">Action</th> --}}
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: center;">Arabic Certificate</td>
                    <td style="text-align: center;">English Certificate</td>

                    {{-- <td style="text-align: center;">
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditCertType">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td> --}}
                </tr>
                              <tr>
                    <td style="text-align: center;">2</td>
                    <td style="text-align: center;">Arabic Transcript</td>
                    <td style="text-align: center;">English Certificate</td>

                    {{-- <td style="text-align: center;">
                        <button onclick="" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditCertType">
                            <img src="{{asset('assets/icons/mage_edit.png')}}" alt="Edit">
                        </button>
                    </td> --}}
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




@endsection
