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
<div class="row nav-tabs custom-tab-container" role="tablist" style="border: none; width: 30vw;">
    <a class="nav-links active" id="batch-tab" data-bs-toggle="tab" href="#batch" role="tab" aria-controls="batch" aria-selected="true">
        Batch
    </a>
    <a class="nav-links" id="control-batch-tab" data-bs-toggle="tab" href="#batchcontrol" role="tab" aria-controls="batchcontrol" aria-selected="false">
        Batch Control
    </a>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="batch" role="tabpanel" aria-labelledby="batch-tab">
        <div class="container mt-5">
            <h1 class="mb-4">Add New Batch</h1>
            <div id="alertArea" class="my-2"></div>
            <form id="addBatchForm">
                @csrf
                <!-- Form Inputs -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fullNameArabic" class="form-label">Batch</label>
                        <input type="text"  name ="batch" class="form-control" id="fullNameArabic" required>
                        <div class="invalid-feedback">Please enter the batch.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="fullNameArabicStatus" class="form-label">Status</label>
                        <select class="form-select" name="graduate_status" aria-label="Default select example " required>

                            <option value="1">Graduated</option>
                            <option value="2">Undergraduated</option>

                        </select>

                        <div class="invalid-feedback">Please enter Graduated or not.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="fullNameArabicStatus" class="form-label">Branch</label>
                        <select class="form-select" name="branch_id" aria-label="Default select example">

                            <option value="1">Please Select a Branch</option>
                             @if(isset($branches) && $branches->isNotEmpty())
                            @foreach ($branches as $data)
                            <option value="{{$data->branch_id}}">{{$data->branch_name_en}}</option>
                            @endforeach
                           @else
                           <option>No Branch available</option>
                          @endif  
                        </select>
                        <div class="invalid-feedback">Please select the branch .</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="department" class="form-label">Faculty</label>
                        <select class="form-select" name="faculty_id" id="facultySelect" required>
                            <option value="">Select Faculty</option>
                            @if(isset($faculties) && $faculties->isNotEmpty())
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->faculty_id }}">{{ $faculty->faculty_name_en }}</option>
                            @endforeach
                           @else
                           <option>No Faculty available</option>
                           @endif  
                        </select>
                        <div class="invalid-feedback">Please select a Faculty.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Major</label>
                        <select class="form-select" name="major_id" id="majorSelect" required>
                            <option value="">Select Major</option>
                            {{-- Will be populated dynamically --}}
                        </select>
                        <div class="invalid-feedback">Please select a Major.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label">Max Semester</label>
                         <input type="number" name="max_sem" class="form-control" id="phoneNumber" max="10" min="1" required>
                        <div class="invalid-feedback">Please enter Max Sem.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="whatsAppNumber" class="form-label">Active Semester</label>
                        <input type="tel" name="active_sem" class="form-control" id="whatsAppNumber" required>
                        <div class="invalid-feedback">Please enter Active Sem.</div>
                    </div>
                </div>
                <!-- Simplified for brevity -->
                <button type="submit" class="btn btn-outline w-100">Submit</button>
            </form>
        </div>
    </div>

    <div class="tab-pane fade" id="batchcontrol" role="tabpanel" aria-labelledby="control-batch-tab">
        <h4>Batches</h4>
        <div class="container my-4">
        <div id="alertAreaBatches" class="my-2"></div> <!-- <- ADD THIS -->

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Batch</th>
                            <th>Faculty</th>
                            <th>Major</th>
                            <th>Branch</th>
                            <th>Active Semester</th>
                            <th>Max Semester</th>
                            <th>status</th>
                            <th>Actions</th>
                       
                        </tr>
                    </thead>
                    <tbody id="batchTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="Editbatch" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editBatchForm">
                    @csrf
                    <input type="hidden" id="editBatchId">
                    <!-- Edit Inputs here -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fullNameArabic" class="form-label">Batch</label>
                            <input type="text" class="form-control" id="edit_batch" name="batch" required>
                            <div class="invalid-feedback">Please enter the batch.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fullNameArabicStatus" class="form-label">Status</label>
                            <select class="form-select" id="edit_graduate_status" name="graduate_status" aria-label="Default select example">
                                <option value="1">Graduated</option>
                                <option value="2">Undergraduated</option>
                            </select>
                            <div class="invalid-feedback">Please enter Graduated or not.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fullNameArabicStatus" class="form-label">Branch</label>
                            <select class="form-select" id="edit_branch_id" name="branch_id" aria-label="Default select example">
                           
                            @foreach ($branches as $data)
                            <option value="{{$data->branch_id}}">{{$data->branch_name_en}}</option>
                            @endforeach
                            </select>
                            <div class="invalid-feedback">Please select the branch.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department" class="form-label">Faculty</label>
                            <select class="form-select" id="edit_dep" name="faculty_id" required style="width: 30vw;">
                                <option value="">Select Faculty</option>
                                <!-- Populate dynamically -->
                            </select>
                            <div class="invalid-feedback">Please select a Faculty.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Major</label>
                            <select class="form-select" id="edit_role" name="major_id" required style="width: 30vw;">
                                <option value="">Select Major</option>
                                <!-- Populate dynamically -->
                            </select>
                            <div class="invalid-feedback">Please select a Major.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Max Semester</label>
                             <input type="number" class="form-control" name="max_sem" id="edit_max_sem" max="10" min="1" required>
                            <div class="invalid-feedback">Please enter Max Sem.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="whatsAppNumber" class="form-label">Active Semester</label>
                            <input type="tel" class="form-control" name="active_sem" id="edit_active_sem" required>
                            <div class="invalid-feedback">Please enter Active Sem.</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

