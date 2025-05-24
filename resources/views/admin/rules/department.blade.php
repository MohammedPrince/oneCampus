@extends('layouts.master')

@section('content')
<nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
  <div class="container-fluid">
    <div class="navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav justify-content-center w-100">
         <a class="nav-link {{ request()->is('admin/academic/certificate') ? 'active' : '' }}" href="{{ route('admin.academic.certificate') }}">Certificate</a>
                <a class="nav-link {{ request()->is('admin/academic/major') ? 'active' : '' }}" href="{{ route('admin.academic.major') }}">Majors</a>
                <a class="nav-link {{ request()->is('admin/academic/batch') ? 'active' : '' }}" href="{{ route('admin.academic.batch') }}">Batches</a>
                <a class="nav-link {{ request()->is('admin/academic/intake') ? 'active' : '' }}" href="{{ route('admin.academic.intake') }}">Intake</a>
              <a class="nav-link {{ request()->is('admin/rule/departments') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Faculty</a>
              <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : ''}}" href="{{route('admin.rule.branch')}}" data-page="branches">Branches</a>
      </div>
    </div>
  </div>
</nav>

<div class="">
  <div class="row">
    @include('layouts.alert')

    <div class="col-4">
      <h2>Faculties:</h2>

    </div>
    <div class="col-4">
      <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#AddFaculty">
        <img src="{{ asset('assets/icons/add.svg') }}" alt="add">
      </button>
    </div>
  </div>

<div id="alertArea" class="my-2"></div>

  {{-- Faculty Table --}}
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Name (English)</th>
          <th style="text-align: center;">Name (Arabic)</th>
          <th style="text-align: center;">Abbreviation</th>
          <th style="text-align: center;">Branch</th>
          {{-- <th style="text-align: center;">Status</th> --}}
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        @if($faculties->isEmpty())
        <tr>
          <td colspan="6" style="text-align: center;">No data available</td>
        </tr>
        @endif
        {{-- Loop through faculties --}}
        @php
          $i = 1;
        @endphp
        @foreach($faculties as $faculty)
        <tr>
          <td style="text-align: center;">{{ $i++   }}</td>
          <td style="text-align: center;">{{ $faculty->faculty_name_en }}</td>
          <td style="text-align: center;">{{ $faculty->faculty_name_ar }}</td>
          <td style="text-align: center;">{{ $faculty->abbreviation }}</td>
          <td style="text-align: center;">{{ $faculty->branch->branch_name_ar ?? 'Null' }}</td>

          <td style="text-align: center;">
            <button class="edit-btn"
              data-bs-toggle="modal"
              data-bs-target="#EditFaculty"
              onclick="Faculty_data({{ json_encode($faculty) }})"
              {{-- data-id="{{ $faculty->faculty_id }}"
              data-en="{{ $faculty->faculty_name_en }}"
              data-ar="{{ $faculty->faculty_name_ar }}"
              data-abbr="{{ $faculty->abbreviation }}"
              data-branch="{{ $faculty->branch->branch_id ?? '' }}" --}}
              style="border: none; background-color: transparent;">
              <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
            </button>


            <a href="{{ route('admin.rule.departments.destroy',  $faculty->faculty_id) }}"><img src="{{ asset('assets/icons/trash-fill (1).svg') }}" onclick="return confirm('Are you sure you want to delete this faculty?')" style="border: none; background-color: transparent;" class="action-icon" alt="Delete"></a>
            {{-- delete --}}


            {{-- <button type="button"
              class="delete-faculty-btn"
              data-id="{{ $faculty->faculty_id }}"
              style="border: none; background-color: transparent;">
              <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Delete" />

    {{-- <button type="button"
        class="delete-faculty-btn"
        data-id="{{ $faculty->faculty_id }}"
        style="border: none; background-color: transparent;">
    <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Delete" />
</button> --}}

              </form>
            </td>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- Add Faculty Modal --}}
<div class="modal fade" id="AddFaculty" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" style="width: 50vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form  method="POST" action="{{ route('faculty.store') }}">
    @csrf
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Faculty Name (English)</label>
              <input type="text" class="form-control @error('faculty_name_en') is-invalid @enderror"  name="faculty_name_en" required>
              @error('faculty_name_en')
                <div class="invalid-feedback">{{ $message }}</div>

              @enderror
              <div class="invalid-feedback">Please enter the Faculty (English).</div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Faculty Name (Arabic)</label>
              <input type="text"  class="form-control @error('faculty_name_ar') is-invalid @enderror" name="faculty_name_ar" required>
              @error('faculty_name_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

             <div class="invalid-feedback">Please enter the Faculty (Arabic).</div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Abbreviation</label>
              <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="abbreviation" required>
                @error('abbreviation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
              <div class="invalid-feedback">Please enter the Abbreviation.</div>

            </div>
            <div class="col-md-6">
              <label class="form-label">Branch</label>
              <select class="form-select" name="branch_id" id="AddFacultyBranch" required>
                <option value="">Select Branch</option>
                 @if(isset($branches) && $branches->isNotEmpty())
                @foreach($branches as $branch)
                <option value="{{ $branch->branch_id }}">{{ $branch->branch_name_ar }}</option>
                @endforeach
                   @else
                  <option>No Branch available</option>
                @endif
              </select>
             <div class="invalid-feedback">Please Select Branch</div>
            </div>
          </div>
          <div class="row justify-content-center">
            <button type="submit" class="btn btn-outline w-50">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Edit Faculty Modal --}}

<div class="modal fade" id="EditFaculty" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" style="width: 50vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      {{-- The ID will be dynamically injected into this action --}}
      @php
        $facultyId = $faculty->faculty_id ?? '';
      @endphp
      {{-- admin.update.dep --}}
      <form method="POST"  action="{{route('admin.update.dep', $facultyId) }}">
        {{-- CSRF token for form submission --}}
        @csrf
        {{-- @method('PUT')  --}}
      {{-- Use PUT method for update --}}

  
        <input type="hidden" name="faculty_id" id="editFacultyId">

        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Faculty Name (Arabic)</label>
              <input type="text" class="form-control @error('faculty_name_ar') is-invalid @enderror" name="faculty_name_ar" id="editFacultyAr" required>
              @error('faculty_name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback">Please enter the Faclty (Arabic).</div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Faculty Name (English)</label>
              <input type="text" class="form-control  @error('faculty_name_en') is-invalid @enderror " name="faculty_name_en" id="editFacultyEn" required>
                 @error('faculty_name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback">Please enter the Faclty (English).</div>
            </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Abbreviation</label>
              <input type="text" class="form-control  @error('abbreviation') is-invalid @enderror " name="abbreviation" id="editFacultyAbbr" required>
                     @error('abbreviation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback">Please enter the Abbreviation.</div>
           
            </div>
            <div class="col-md-6">
              <label class="form-label">Branch</label>
              <select class="form-select" name="branch_id" id="editFacultyBranch" required>
                <option value="">Select Branch</option>
                @foreach($branches as $branch)
                  <option value="{{ $branch->branch_id }}"> {{ $branch->branch_name_ar }} </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row justify-content-center">
            <button type="submit" class="btn btn-outline w-50">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
