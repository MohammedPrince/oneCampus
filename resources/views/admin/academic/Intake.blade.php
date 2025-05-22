@extends('layouts.master')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
    <div class="container-fluid">
        <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
                <a class="nav-link {{ request()->is('admin/academic/certificate') ? 'active' : ''}}" href="{{route('admin.academic.certificate')}}">Certificate</a>
                <a class="nav-link {{ request()->is('admin/academic/major') ? 'active' : ''}}" href="{{route('admin.academic.major')}}">Majors</a>
                <a class="nav-link {{ request()->is('admin/academic/batch') ? 'active' : ''}}" href="{{route('admin.academic.batch')}}">Batches</a>  
                <a class="nav-link {{ request()->is('admin/academic/intake') ? 'active' : ''}}" href="{{route('admin.academic.intake')}}">Intake</a>  
               <a class="nav-link {{ request()->is('admin/rule/departments') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Faculty</a>
              <a class="nav-link {{ request()->is('admin/rule/branch') ? 'active' : ''}}" href="{{route('admin.rule.branch')}}" data-page="branches">Branches</a>
            </div>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col-4">
        <h2>Intake:</h2>
    </div>
    <div class="col-4">
        <button style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#AddIntakeModal">
            <img src="{{asset('assets/icons/add.svg')}}" alt="add">
        </button>
    </div>
</div>

<div class="container my-4">
            <div id="alertArea" class="my-2"></div>

    <!-- Table for displaying intakes -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                    <th style="text-align: center;">Id</th>
                    <th style="text-align: center;">Intake Description (English)</th>
                    <th style="text-align: center;">Intake Description (Arabic)</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($intakes as $intake)
                    <tr id="intakeRow-{{ $intake->intake_id  }}">
                        <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox"></td>
                        <td style="text-align: center;">{{ $intake->intake_id  }}</td>
                        <td style="text-align: center;">{{ $intake->intake_name_en }}</td>
                        <td style="text-align: center;">{{ $intake->intake_name_ar }}</td>
                        <td style="text-align: center;">
                            <button type="button" class="editIntake" data-id="{{ $intake->intake_id }}" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#EditIntakeModal">
                                <img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit">
                            </button>
                          
                             <button class="deleteIntakeBtn" data-id="{{ $intake->intake_id }}" style="border: none; background-color: transparent;">
                            <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" alt="Delete" />
                            </button>

                            </form>
                        </td>
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Intake Modal -->
<div class="modal fade" id="AddIntakeModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50vw; margin-top: 5vh;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Intake</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="row needs-validation" novalidate id="addIntakeForm">
                  @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="intakeNameEn" class="form-label">Intake (English)</label>
                            <input type="text" class="form-control" id="intakeNameEn" name="intake_name_en" required>
                            <div class="invalid-feedback">Please enter the Intake (English).</div>
                        </div>
                        <div class="col-md-6">
                            <label for="intakeNameAr" class="form-label">Intake (Arabic)</label>
                            <input type="text" class="form-control" id="intakeNameAr" name="intake_name_ar" required>
                            <div class="invalid-feedback">Please enter the Intake (Arabic).</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline" style="margin: 1px; width: 15vw;">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Intake Modal -->
<div class="modal fade" id="EditIntakeModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50vw; margin-top: 5vh;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Intake</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row needs-validation" novalidate id="editIntakeForm">
                  @csrf
                  @method('PUT')
                    <input type="hidden" id="editintakeId">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="intakeNameEn" class="form-label">Intake (English)</label>
                            <input type="text" class="form-control" id="editintakeNameEn" name="intake_name_en" required>
                            <div class="invalid-feedback">Please enter the Intake (English).</div>
                        </div>
                        <div class="col-md-6">
                            <label for="intakeNameAr" class="form-label">Intake (Arabic)</label>
                            <input type="text" class="form-control" id="editintakeNameAr" name="intake_name_ar" required>
                            <div class="invalid-feedback">Please enter the Intake (Arabic).</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline" style="margin: 1px; width: 15vw;">Update</button>
                        </div>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
