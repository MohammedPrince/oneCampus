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
                        <select class="form-select" name="graduate_status" aria-label="Default select example ">

                            <option value="1">Graduated</option>
                            <option value="2">Undergraduated</option>

                        </select>

                        <div class="invalid-feedback">Please enter Graduated or not.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="fullNameArabicStatus" class="form-label">Branch</label>
                        <select class="form-select" name="branch_id" aria-label="Default select example">

                            <option value="1">Please Select a Branch</option>
                            @php
                                $branch = App\Models\Branch::all();
                            @endphp
                            @foreach ($branch as $data)
                            <option value="{{$data->branch_id}}">{{$data->branch_name_en}}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">Please select the branch .</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="department" class="form-label">Faculty</label>
                        <select class="form-select" name="faculty_id" id="facultySelect" required>
                            <option value="">Select Faculty</option>
                            @php
                                $faculties = App\Models\Faculty::all();
                            @endphp
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->faculty_id }}">{{ $faculty->faculty_name_en }}</option>
                            @endforeach
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
                        <input type="tel" name="max_sem" class="form-control" id="phoneNumber" required>
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
                            <th>Edit</th>
                            <th>Delete</th>
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
                                @php
                                $branch = App\Models\Branch::all();
                            @endphp
                            @foreach ($branch as $data)
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
                            <input type="tel" class="form-control" name="max_sem" id="edit_max_sem" required>
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
@section('scripts')
<script>
    $(document).ready(function () {
        fetchBatches();

        function fetchBatches() {
            $.get("{{ route('admin.academic.batch.fetch') }}", function (data) {
                let tbody = '';
                $.each(data, function (i, batch) {
                 
                    tbody += `
                        <tr>
                            <td style="text-align: center;"><input type="checkbox" class="batchCheckbox"></td>
                            <td style="text-align: center;">${batch.batch}</td>
                            <td style="text-align: center;">${batch.faculty ? batch.faculty.faculty_name_en : 'Faculty data is soft deleted.'}</td>
                            <td style="text-align: center;">${batch.major ? batch.major.major_name_en : 'Major data is soft deleted.'}</td>
                            <td style="text-align: center;">${batch.branch ? batch.branch.branch_name_en : 'Branch data is soft deleted.'}</td>
                            <td style="text-align: center;">${batch.active_sem}</td>
                            <td style="text-align: center;">${batch.max_sem}</td>
                            <td style="text-align: center;">${batch.graduate_status}</td>
                            <td style="text-align: center;"><button class="btn btn-sm  editBatchBtn" data-id="${batch.batch_control_id}"><img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit"></button></td>
                            <td style="text-align: center;"><button class="btn btn-sm  deleteBatchBtn" data-id="${batch.batch_control_id}"><img src="{{ asset('assets/icons/trash-fill (1).svg') }}" alt="delete"></button></td>
                        </tr>
                    `;
                });
                $('#batchTableBody').html(tbody);
            });
        }

        $('#addBatchForm').submit(function (e) {
            e.preventDefault();
            $.post("{{ route('admin.academic.batch.store') }}", $(this).serialize(), function () {
                fetchBatches();
                $('#addBatchForm')[0].reset();
            });
        });

        $(document).on('click', '.editBatchBtn', function () {
    const id = $(this).data('id');
    
    // Send an AJAX request to get the batch data by ID
    $.get(`/admin/academic/batch/${id}/edit`, function (data) {
        // console.log(data); // Check what data you receive

        // Populate the modal fields with the retrieved data
        $('#editBatchId').val(data.batch_control_id);
        $('#edit_batch').val(data.batch);
        $('#edit_graduate_status').val(data.graduate_status);
        $('#edit_max_sem').val(data.max_sem);
        $('#edit_active_sem').val(data.active_sem);
        $('#edit_dep').val(data.faculty_id);
        $('#edit_role').val(data.major_id);
        $('#edit_branch_id').val(data.branch_id); // don't forget this too

        // Fetch faculty dropdown first
        $.get('/admin/faculty', function (faculties) {
            let facultyOptions = '<option value="">Select Faculty</option>';
            $.each(faculties, function (i, faculty) {
                facultyOptions += `<option value="${faculty.faculty_id}">${faculty.faculty_name_en}</option>`;
            });
            $('#edit_dep').html(facultyOptions);
            $('#edit_dep').val(data.faculty_id); // now we can set it

            // Now get the majors for selected faculty
            $.get(`/admin/academic/faculty/${data.faculty_id}/majors`, function (majors) {
                let majorOptions = '<option value="">Select Major</option>';
                $.each(majors, function (index, major) {
                    majorOptions += `<option value="${major.major_id}">${major.major_name_en}</option>`;
                });
                $('#edit_role').html(majorOptions);
                $('#edit_role').val(data.major_id); // set after options are populated
            });
        });
        // Show the modal
        $('#Editbatch').modal('show');
    }).fail(function() {
        alert('Error fetching batch data.');
    });
});

$('#editBatchForm').submit(function (e) {
    e.preventDefault();
    const id = $('#editBatchId').val();
    $.ajax({
        url: `/admin/academic/batch/${id}`,
        method: 'PUT',
        data: $(this).serialize(),
        success: function () {
            $('#Editbatch').modal('hide');
            alert('Batch Updated Successfully');
            fetchBatches();
        }
    });
});

        $(document).on('click', '.deleteBatchBtn', function () {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this batch?')) {
                $.ajax({
                    url: `/admin/academic/batch/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        alert('Batch Deleted Successfully');
                        fetchBatches();
                    }
                });
            }
        });
        $('#facultySelect').on('change', function () {
            const facultyId = $(this).val();
            $('#majorSelect').html('<option value="">Loading...</option>');

            if (facultyId) {
                $.ajax({
                    url: `/admin/academic/faculty/${facultyId}/majors`,
                    type: 'GET',
                    success: function (majors) {
                        let options = '<option value="">Select Major</option>';
                        $.each(majors, function (index, major) {
                            options += `<option value="${major.major_id}">${major.major_name_en}</option>`;
                        });
                        $('#majorSelect').html(options);
                    }
                });
            } else {
                $('#majorSelect').html('<option value="">Select Major</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Activate Bootstrap 5 tabs automatically
        var triggerTabList = [].slice.call(document.querySelectorAll('#batch-tab, #control-batch-tab'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        });
    });
</script>

@endsection
