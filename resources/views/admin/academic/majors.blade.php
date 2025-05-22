@extends('layouts.master')
@section('content')
    @include('layouts.alert')
    <nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-center w-100">
                    <a class="nav-link {{ request()->is('admin/academic/certificate') ? 'active' : '' }}"
                        href="{{ route('admin.academic.certificate') }}" id="usersLink" aria-current="page">Certificate</a>
                    <a class="nav-link {{ request()->is('admin/academic/major') ? 'active' : '' }}"
                        href="{{ route('admin.academic.major') }}" id="addUsersLink">Majors</a>
                    <a class="nav-link {{ request()->is('admin/academic/batch') ? 'active' : '' }}"
                        href="{{ route('admin.academic.batch') }}" id="resetPasswordsLink">Batches</a>
                    <a class="nav-link {{ request()->is('admin/academic/intake') ? 'active' : '' }}"
                        href="{{ route('admin.academic.intake') }}" id="resetPasswordsLink">Intake</a>
                    <a class="nav-link {{ request()->is('admin/rule/departments') ? 'active' : '' }}"
                        href="{{ route('admin.rule.dept') }}" data-page="department">Faculty</a>
                    <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : '' }}"
                        href="{{ route('admin.rule.branch') }}" data-page="branches">Branches</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row nav-tabs" role="tablist" style="border: none; width: 30vw;">
        <a class="nav-links active" href="#batch" id="batch-tab"data-bs-toggle="tab" role="tab" aria-controls="batch"
            aria-selected="true">Add Major</a>
        <a class="nav-links" href="#batchcontrol" id="control-batch-tab"data-bs-toggle="tab" role="tab"
            aria-controls="batchcontrol" aria-selected="true">Majors</a>
    </div>

    <!-- Tab content -->
    <div class="tab-content">
        <!-- Add Major Form -->
        <div id="batch" class="tab-pane fade show active">
            <div class="container mt-5">
                <h4 class="mb-4">Add New Major</h4>

                <div id="alertArea" class="my-2"></div>
                {{-- {{ route('admin.academic.major.store') }} --}}
                {{-- <form id="add-major-form" class="row needs-validation" novalidate> --}}

                <form action="{{ route('admin.academic.major.store') }}" method="POST">

                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="major_name_en" class="form-label">Name In English</label>
                            <input type="text" class="form-control @error('major_name_en') is-invalid @enderror"
                                id="major_name_en" name="major_name_en" value="{{ old('major_name_en') }}" required>
                            @error('major_name_en')
                                {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                            @else
                                {{-- <div class="invalid-feedback">Please enter the Major Name In English.</div> --}}
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="major_name_ar" class="form-label">Name In Arabic </label>
                            <input type="text" class="form-control @error('major_name_ar') is-invalid @enderror"
                                id="major_name_ar" name="major_name_ar" value="{{ old('major_name_ar') }}" required>
                            @error('major_name_ar')
                                {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                            @else
                                {{-- <div class="invalid-feedback">. يُرجى إدخال اسم التخصص باللغة العربية                              </div> --}}
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="major_abbreviation">Abbreviation</label>
                            <input type="text" name="major_abbreviation"
                                class="form-control @error('major_abbreviation') is-invalid @enderror"
                                value="{{ old('major_abbreviation') }}" required>
                            @error('major_abbreviation')
                                {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="credits_required" class="form-label">Credits Required </label>
                            <input type="text" class="form-control" id="credits_required" name="credits_required"
                                value="{{ old('credits_required') }}" required>
                            {{-- <div class="invalid-feedback">Please enter the number of credits required.</div> --}}
                        </div>
                        <div class="col-md-6">
                            <label for="major_ministry_code">Ministry Code</label>
                            <input type="text" name="major_ministry_code"
                                class="form-control @error('major_ministry_code') is-invalid @enderror"
                                value="{{ old('major_ministry_code') }}" required>
                            @error('major_ministry_code')
                                {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="program_mode" class="form-label">Program Mode</label>
                            <input type="text" class="form-control" id="major_mode" name="major_mode"
                                value="{{ old('major_mode') }}" required>
                            {{-- <div class="invalid-feedback">Please enter the Program Mode.</div> --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="degree_type" class="form-label">Degree Type </label>
                            <select class="form-select" id="degree_type" name="degree_type"
                                value="{{ old('degree_type') }}" required style="width: 30vw;">
                                <option value="">Select Degree </option>
                                <option value="BS.c with (Honor)">BS.c with (Honor) </option>
                                <option value="BS.c">BS.c</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Master">Master</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="faculty" class="form-label">Faculty </label>
                            <select class="form-select" id="faculty_id" name="faculty_id" required style="width: 30vw;">
                                <option value="">Select Faculty </option>
                                @if (isset($faculty) && $faculty->isNotEmpty())
                                    @foreach ($faculty as $data)
                                        <option value="{{ $data->faculty_id }}">{{ $data->faculty_name_en }}</option>
                                    @endforeach
                                @else
                                    <option>No Faculty available</option>
                                @endif
                            </select>
                            {{-- <div class="invalid-feedback">Please select a Faculty.</div> --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="semesters_count" class="form-label">Number Of Semesters</label>
                            <input type="text" class="form-control" id="number_of_semesters"
                                name="number_of_semesters" value="{{ old('number_of_semesters') }}"required>
                            <div class="invalid-feedback">Please enter the number of semesters.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="program_duration" class="form-label">Program Duration </label>
                            <input type="text" class="form-control" id="program_duration" name="program_duration"
                                value="{{ old('program_duration') }}" required>
                            {{-- <div class="invalid-feedback">Please enter the program duration.</div> --}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline w-25">Submit</button>
                    </div>

                </form>
            </div>
        </div>


        <!-- Majors Table -->
        <div id="batchcontrol" class="tab-pane fade">
            <h4>Majors</h4>
            <div class="container my-4">
                <div id="alertAreaMajors" class="my-2"></div> <!-- <- ADD THIS -->
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
                                <th style="text-align: center;">ِAction</th>
                            </tr>
                        </thead>
                        {{-- <tbody id="majors-table-body">
                        </tbody> --}}
                        @foreach ($majors as $major)
    <tr>
        <td style="text-align: center;">
            <input type="checkbox" class="select-checkbox" data-id="{{ $major->major_id }}">
        </td>
        <td style="text-align: center;">{{ $major->major_name_en }}</td>
        <td style="text-align: center;">{{ $major->major_name_ar }}</td>
        <td style="text-align: center;">{{ $major->major_abbreviation }}</td>
        <td style="text-align: center;">{{ $major->credits_required }}</td>
        <td style="text-align: center;">{{ $major->major_ministry_code }}</td>
        <td style="text-align: center;">{{ $major->major_mode }}</td>
        <td style="text-align: center;">{{ $major->degree_type }}</td>
        <td style="text-align: center;">
            {{ $major->faculty->faculty_name_en }}
        </td>
        <td style="text-align: center;">{{ $major->number_of_semesters }}</td>
        <td style="text-align: center;">{{ $major->program_duration }}</td>
        <td style="text-align: center;">
            <div class="d-flex gap-1">
                <button class="btn btn-sm" onclick="Major_data({{ json_encode($major) }})" data-bs-toggle="modal" data-bs-target="#Editprogram">
                    <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
                </button>
                <button class="btn btn-sm delete-major" data-id="{{ $major->major_id }}">
                    <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Delete">
                </button>
            </div>
        </td>
    </tr>
@endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Major Modal -->
    <div class="modal fade" id="Editprogram" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Major</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- /admin/academic/major/update/${majorId} --}}
                    <form method="POST" action="{{ route('admin.academic.major.update') }}">
                        @csrf


                        <input type="hidden" name="major_id" id="edit_major_id">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="major_name_en" class="form-label">Name In English </label>
                                <input type="text" class="form-control" id="edit_major_name_en" name="major_name_en"
                                    required>
                                <div class="invalid-feedback">Please enter the Program Name In English.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="major_name_ar" class="form-label">Name In Arabic </label>
                                <input type="text"  class="form-control" id="edit_major_name_ar" name="major_name_ar"
                                    required>
                                <div class="invalid-feedback">Please enter the Program Name In Arabic.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="abbreviation" class="form-label">Abbreviation</label>
                                <input type="text"  class="form-control" id="edit_major_abbreviation"
                                    name="major_abbreviation" required>
                                <div class="invalid-feedback">Please enter the Program Abbreviation.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="credits_required" class="form-label">Credits Required </label>
                                <input type="text"  class="form-control" id="edit_credits_required"
                                    name="credits_required" required>
                                <div class="invalid-feedback">Please enter the number of credits required.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_ministry_code" class="form-label">Program Ministry Code </label>
                                <input type="text"  class="form-control" id="edit_major_ministry_code"
                                    name="major_ministry_code" required>
                                <div class="invalid-feedback">Please enter the Program Ministry Code.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_mode" class="form-label">Program Mode</label>
                                <input type="text" class="form-control" id="edit_program_mode" name="major_mode"
                                    required>
                                <div class="invalid-feedback">Please enter the Program Mode.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="degree_type" class="form-label">Degree Type </label>
                                <select class="form-select" id="edit_degree_type" name="degree_type" required
                                    style="width: 30vw;">
                                    <option value="">Select Degree </option>
                                    <option value="BS.c with (Honor)">BS.c with (Honor) </option>
                                    <option value="BS.c">BS.c</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Master">Master</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="faculty" class="form-label">Faculty </label>
                                <select class="form-select" id="edit_faculty_id" name="faculty_id" required
                                    style="width: 30vw;">
                                    <option value="">Select Faculty </option>
                                    @foreach ($faculty as $data)
                                        <option value="{{ $data->faculty_id }}">{{ $data->faculty_name_en }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a Faculty.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="semesters_count" class="form-label">Number Of Semesters</label>
                                <input type="text" class="form-control" id="edit_number_of_semesters"
                                    name="number_of_semesters" required>
                                <div class="invalid-feedback">Please enter the number of semesters.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="program_duration" class="form-label">Program Duration </label>
                                <input type="text" class="form-control" id="edit_program_duration"
                                    name="program_duration" required>
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
