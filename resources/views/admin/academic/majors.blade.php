@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-center w-100">
                    <a class="nav-link {{ request()->is('admin/academic/certificate') ? 'active' : '' }}" href="{{ route('admin.academic.certificate') }}" id="usersLink" aria-current="page">Certificate</a>
                    <a class="nav-link {{ request()->is('admin/academic/major') ? 'active' : '' }}" href="{{ route('admin.academic.major') }}" id="addUsersLink">Majors</a>
                    <a class="nav-link {{ request()->is('admin/academic/batch') ? 'active' : '' }}" href="{{ route('admin.academic.batch') }}" id="resetPasswordsLink">Batches</a>
                    <a class="nav-link {{ request()->is('admin/academic/intake') ? 'active' : ''}}" href="{{route('admin.academic.intake')}}" id="resetPasswordsLink">Intake</a>  
                </div>
            </div>
        </div>
    </nav>

    <div class="row nav-tabs" role="tablist" style="border: none; width: 30vw;">
        <a class="nav-links active" href="#batch" id="batch-tab"data-bs-toggle="tab" role="tab" aria-controls="batch" aria-selected="true">Add Major</a>
        <a class="nav-links" href="#batchcontrol" id="control-batch-tab"data-bs-toggle="tab" role="tab" aria-controls="batchcontrol" aria-selected="true">Majors</a>
    </div>

    <!-- Tab content -->
    <div class="tab-content">
        <!-- Add Major Form -->
        <div id="batch" class="tab-pane fade show active">
            <div class="container mt-5">
                <h1 class="mb-4">Add New Program</h1>
                <form id="add-major-form" class="row needs-validation" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="major_name_en" class="form-label">Name In English </label>
                            <input type="text" class="form-control" id="major_name_en" name="major_name_en" required>
                            <div class="invalid-feedback">Please enter the Program Name In English.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="major_name_ar" class="form-label">Name In Arabic </label>
                            <input type="text" class="form-control" id="major_name_ar" name="major_name_ar" required>
                            <div class="invalid-feedback">Please enter the Program Name In Arabic.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="abbreviation" class="form-label">Abbreviation</label>
                            <input type="text" class="form-control" id="major_abbreviation" name="major_abbreviation" required>
                            <div class="invalid-feedback">Please enter the Program Abbreviation.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="credits_required" class="form-label">Credits Required </label>
                            <input type="text" class="form-control" id="credits_required" name="credits_required" required>
                            <div class="invalid-feedback">Please enter the number of credits required.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="program_ministry_code" class="form-label">Program Ministry Code </label>
                            <input type="text" class="form-control" id="major_ministry_code" name="major_ministry_code" required>
                            <div class="invalid-feedback">Please enter the Program Ministry Code.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="program_mode" class="form-label">Program Mode</label>
                            <input type="text" class="form-control" id="major_mode" name="major_mode" required>
                            <div class="invalid-feedback">Please enter the Program Mode.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="degree_type" class="form-label">Degree Type </label>
                            <select class="form-select" id="degree_type" name="degree_type" required style="width: 30vw;">
                                <option value="">Select Degree </option>
                                <option value="IT">IT</option>
                                <option value="BA">BA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="faculty" class="form-label">Faculty </label>
                            <select class="form-select" id="faculty_id" name="faculty_id" required style="width: 30vw;">
                                <option value="">Select Faculty </option>
                                @foreach ($faculty as $data )
                                <option value="{{$data->faculty_id}}">{{$data->faculty_name_en}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a Faculty.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="semesters_count" class="form-label">Number Of Semesters</label>
                            <input type="text" class="form-control" id="number_of_semesters" name="number_of_semesters" required>
                            <div class="invalid-feedback">Please enter the number of semesters.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="program_duration" class="form-label">Program Duration </label>
                            <input type="text" class="form-control" id="program_duration" name="program_duration" required>
                            <div class="invalid-feedback">Please enter the program duration.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline w-100">Submit</button>
                </form>
            </div>
        </div>

        <!-- Majors Table -->
        <div id="batchcontrol" class="tab-pane fade">
            <h4>Programs</h4>
            <div class="container my-4">
                <div class="mb-3">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search..." onkeyup="filterTable()" style="width: 30vw;" />
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                                <th style="text-align: center;">Name In English</th>
                                <th style="text-align: center;">Name In Arabic</th>
                                <th style="text-align: center;">Abbreviation</th>
                                <th style="text-align: center;">Credits Required</th>
                                <th style="text-align: center;">Program Ministry Code</th>
                                <th style="text-align: center;">Program Mode</th>
                                <th style="text-align: center;">Degree Type</th>
                                <th style="text-align: center;">Faculty</th>
                                <th style="text-align: center;">Number Of Semesters</th>
                                <th style="text-align: center;">Program Duration</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">edit</th>
                                <th style="text-align: center;">delete</th>

                            </tr>
                        </thead>
                        <tbody id="majors-table-body">
                            <!-- Rows will be added via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Major Modal -->
    <div class="modal fade" id="Editprogram" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-major-form" class="row needs-validation" novalidate>
                        <input type="hidden" id="edit_major_id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="major_name_en" class="form-label">Name In English </label>
                                <input type="text" class="form-control" id="edit_major_name_en" name="major_name_en" required>
                                <div class="invalid-feedback">Please enter the Program Name In English.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="major_name_ar" class="form-label">Name In Arabic </label>
                                <input type="text" class="form-control" id="edit_major_name_ar" name="major_name_ar" required>
                                <div class="invalid-feedback">Please enter the Program Name In Arabic.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="abbreviation" class="form-label">Abbreviation</label>
                                <input type="text" class="form-control" id="edit_major_abbreviation" name="major_abbreviation" required>
                                <div class="invalid-feedback">Please enter the Program Abbreviation.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="credits_required" class="form-label">Credits Required </label>
                                <input type="text" class="form-control" id="edit_credits_required" name="credits_required" required>
                                <div class="invalid-feedback">Please enter the number of credits required.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_ministry_code" class="form-label">Program Ministry Code </label>
                                <input type="text" class="form-control" id="edit_major_ministry_code" name="major_ministry_code" required>
                                <div class="invalid-feedback">Please enter the Program Ministry Code.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_mode" class="form-label">Program Mode</label>
                                <input type="text" class="form-control" id="edit_program_mode" name="major_mode" required>
                                <div class="invalid-feedback">Please enter the Program Mode.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="degree_type" class="form-label">Degree Type </label>
                                <select class="form-select" id="edit_degree_type" name="degree_type" required style="width: 30vw;">
                                    <option value="">Select Degree </option>
                                    <option value="IT">IT</option>
                                    <option value="BA">BA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="faculty" class="form-label">Faculty </label>
                                <select class="form-select" id="edit_faculty_id" name="faculty_id" required style="width: 30vw;">
                                    <option value="">Select Faculty </option>
                                    @foreach ($faculty as $data )
                                    <option value="{{$data->faculty_id}}">{{$data->faculty_name_en}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a Faculty.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="semesters_count" class="form-label">Number Of Semesters</label>
                                <input type="text" class="form-control" id="edit_number_of_semesters" name="number_of_semesters" required>
                                <div class="invalid-feedback">Please enter the number of semesters.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_duration" class="form-label">Program Duration </label>
                                <input type="text" class="form-control" id="edit_program_duration" name="program_duration" required>
                                <div class="invalid-feedback">Please enter the program duration.</div>
                            </div>
                        </div>
                        <!-- More fields similar to the Add Major form -->
                        <button type="submit" class="btn btn-outline w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')

    <script>
        // Handle the Add Major Form
        $('#add-major-form').on('submit', function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let majorData = {
                _token: $('meta[name="csrf-token"]').attr('content'), // ✅ This line is key!
                major_name_en: $('#major_name_en').val(),
                major_name_ar: $('#major_name_ar').val(),
                major_abbreviation: $('#major_abbreviation').val(),
                credits_required: $('#credits_required').val(),
                major_ministry_code: $('#major_ministry_code').val(),
                major_mode: $('#major_mode').val(),
                degree_type: $('#degree_type').val(),
                faculty_id: $('#faculty_id').val(),
                number_of_semesters: $('#number_of_semesters').val(),
                program_duration: $('#program_duration').val(),
            };

            $.ajax({
                url: '{{ route("admin.academic.major.store") }}', // Update route accordingly
                method: 'POST',
                data: majorData,
                success: function(response) {
                    // Handle success (e.g., refresh the major list)
                    alert('Major Added!');
                    loadMajors(); // Reload table with new data
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });

        // Load Majors for the table
        function loadMajors() {
    $.ajax({
        url: '{{ route("admin.academic.major.data") }}',  // Get data through AJAX
        method: 'GET',
        success: function(response) {
            // Check the structure of the response object
            if (response && response.majors) {
                let tableBody = $('#majors-table-body');
                tableBody.empty();
                response.majors.forEach(function(major) {
                    tableBody.append(`
                        <tr>
                            <td style="text-align: center;"><input type="checkbox" class="majorCheckbox" /></td>
                            <td style="text-align: center;">${major.major_name_en}</td>
                            <td style="text-align: center;">${major.major_name_ar}</td>
                            <td style="text-align: center;">${major.major_abbreviation}</td>
                            <td style="text-align: center;">${major.credits_required}</td>
                            <td style="text-align: center;">${major.major_ministry_code}</td>
                            <td style="text-align: center;">${major.major_mode}</td>
                            <td style="text-align: center;">${major.degree_type}</td>
                            <td style="text-align: center;">${major.faculty.faculty_name_en}</td>
                            <td style="text-align: center;">${major.number_of_semesters}</td>
                            <td style="text-align: center;">${major.program_duration}</td>
                            <td style="text-align: center;">
                                <div class="outerDivFull">
                                    <div class="switchToggle">
                                        <input type="checkbox" id="switch${major.major_id}" style="width: 30vw;">
                                        <label for="switch${major.major_id}">Toggle</label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <button onclick="editMajor(${major.major_id})" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#Editprogram">
                                    <img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit">
                                </button>
                            </td>
                            <td style="text-align: center;">
                            <button class="btn  btn-sm delete-major" data-id="${major.major_id}"> <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" alt="Delete" /></button>
                        </td>
                        </tr>
                    `);
                });
            } else {
                console.error("Error: Majors data is missing or undefined in the response.");
            }
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
}


        // Load majors on page load
        $(document).ready(function() {
            loadMajors();
        });

        // Handle Edit Major
        function editMajor(majorId) {
            $.ajax({
                url: '/admin/academic/major/' + majorId + '/edit', // Update route accordingly
                method: 'GET',
                success: function(response) {
                    $('#edit_major_id').val(response.major.major_id);
                    $('#edit_major_name_en').val(response.major.major_name_en);
                    $('#edit_major_name_ar').val(response.major.major_name_ar);
                    $('#edit_major_abbreviation').val(response.major.major_abbreviation);
                    $('#edit_credits_required').val(response.major.credits_required);
                    $('#edit_major_ministry_code').val(response.major.major_ministry_code);
                    $('#edit_program_mode').val(response.major.major_mode);
                    $('#edit_degree_type').val(response.major.degree_type);
                    $('#edit_faculty_id').val(response.major.faculty_id);
                    $('#edit_number_of_semesters').val(response.major.number_of_semesters);
                    $('#edit_program_duration').val(response.major.program_duration);

                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
        $(document).on('click', '.delete-major', function () {
    const majorId = $(this).data('id');
    if (confirm('Are you sure you want to delete this major?')) {
        $.ajax({
            url: `/admin/academic/major/delete/${majorId}`,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert('Major deleted successfully!');
                loadMajors(); // Refresh the list
            },
            error: function (xhr) {
                alert('Failed to delete major.');
            }
        });
    }
});

</script>
@endsection