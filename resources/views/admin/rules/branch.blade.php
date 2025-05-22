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
        <div class="col-4">
            <h2>Branches :</h2>
        </div>
        <div class="col-4">
            <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#AddBranch">
                <img src="{{asset('assets/icons/add.svg')}}" alt="add">
            </button>
        </div>
    </div>

<div id="alertArea" class="my-2"></div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                        <th style="text-align: center;">Name (English)</th>
                        <th style="text-align: center;">Name (Arabic)</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">City</th>
                        <th style="text-align: center;">Country</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($branches as $branch)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                        <td style="text-align: center;">{{ $branch->branch_name_ar }}</td>
                        <td style="text-align: center;">{{ $branch->branch_name_en }}</td>
                        <td style="text-align: center;">{{ $branch->branch_address }}</td>
                        <td style="text-align: center;">{{ $branch->branch_city }}</td>
                        <td style="text-align: center;">{{ $branch->country->country_name_en }}</td>

                        <td style="text-align: center;">
                            <button
                            data-id="{{ $branch->branch_id }}"
                            data-branch_name_ar="{{ $branch->branch_name_ar }}"
                            data-branch_name_en="{{ $branch->branch_name_en }}"
                            data-branch_country="{{ $branch->country_id }}"
                            data-branch_city="{{ $branch->branch_city }}"
                            data-branch_address="{{ $branch->branch_address }}"
                            onclick="editBranch(this)"
                            style="border: none; background-color: transparent;"
                            data-bs-toggle="modal"
                            data-bs-target="#EditBranch">
                            <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
                        </button>

                        <button
                        class="delete-branch-btn"
                        data-id="{{ $branch->branch_id }}"
                        style="border: none; background-color: transparent;">
                        <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Delete" />
                    </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Branch Modal -->
<div class="modal fade" id="EditBranch" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editBranchForm" class="row needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Branch Name (Arabic)</label>
                            <input type="text" name="branch_name_ar" class="form-control" id="edit_name_ar" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Branch Name (English)</label>
                            <input type="text" name="branch_name_en" class="form-control" id="edit_name_en" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <select class="form-select" name="country_id" id="edit_country" required>
                        <option value="">Select Country</option>
                        @foreach($country as $data)
                        <option value="{{ $data->country_id }}">{{ $data->country_name_ar }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="branch_city" class="form-control" id="edit_city" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="branch_address" class="form-control" id="edit_address" required>
                        </div>
                    </div>
                    <center>
                    <button type="submit" class="btn btn-outline w-50">Update</button>

                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Branch Modal -->
<div class="modal fade" id="AddBranch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addBranchForm" class="row needs-validation" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Branch Name (Arabic)</label>
                            <input type="text" name="branch_name_ar" class="form-control" required>
                            <div class="invalid-feedback">Please enter the Branch (Arabic).</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Branch Name (English)</label>
                            <input type="text" name="branch_name_en" class="form-control" id="edit_name_en" required>
                            <div class="invalid-feedback">Please enter the Branch (English).</div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <select class="form-select" name="country_id" id="edit_country" required>
                        <option value="">Select Country</option>
                        @if(isset($country) && $country->isNotEmpty())
                        @foreach($country as $data)
                        <option value="{{ $data->country_id }}">{{ $data->country_name_ar }}</option>
                        @endforeach
                          @else
                            <option>No Country available</option>
                         @endif
                        </select>
                      <div class="invalid-feedback">Please Select Country</div>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="branch_city" class="form-control" required>
                            <div class="invalid-feedback">Please enter the City Name</div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="branch_address" class="form-control" required>
                            <div class="invalid-feedback">Please enter the Address</div>

                        </div>
                    </div>
                     <center>
                    <button type="submit" class="btn btn-outline w-50">Add</button>
                     </center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

