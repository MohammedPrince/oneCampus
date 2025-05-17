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
    <!-- Search bar -->
    <div class="mb-3">
        <input type="text" id="tableSearch" class="form-control" placeholder="Search..." onkeyup="filterTable()" style="width: 30vw;">
    </div>

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
                            <form action="{{ route('admin.academic.intake.destroy', $intake->intake_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this intake?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background-color: transparent;">
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
                        <div class="col-6">
                            <button type="button" class="btn btn-outline" style="margin: 1px; width: 15vw;" id="deleteIntakeBtn">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    // Handle Add Intake
  // Handle Add Intake
$(document).on('submit', '#addIntakeForm', function(e) {
    e.preventDefault();
    
    var intakeNameAr = $('#intakeNameAr').val();
    var arabicRegex = /^[\u0600-\u06FF\s]+$/; // Regex for Arabic characters and spaces

    if (!arabicRegex.test(intakeNameAr)) {
        alert('Intake name in Arabic should only contain Arabic characters.');
        return; // Prevent form submission if the input is invalid
    }
    var formData = $(this).serialize();
    
    $.ajax({
        url: '/admin/academic/intake/store',
        method: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);  // Add this line to check the response from the server

            if (response.status === 'success') {
                $('#AddIntakeModal').modal('hide');
                alert(response.message); // Display success message
                window.location.reload(); // Refresh the page after adding
            } else {
                alert('Error adding intake');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);  // Log the error response for debugging
            alert('Error adding intake');
        }
    });
});

    // Handle Edit Intake
    $(document).on('click', '.editIntake', function () {
        const intakeId = $(this).data('id');
        
        $.get(`/admin/academic/intake/${intakeId}/edit`, function (data) {
            $('#editintakeId').val(data.intake_id);
            $('#editintakeNameEn').val(data.intake_name_en);
            $('#editintakeNameAr').val(data.intake_name_ar);
            $('#EditIntakeModal').modal('show');
        }).fail(function() {
            alert('Error fetching intake data.');
        });
    });

    // Handle Update Intake
    $(document).on('submit', '#editIntakeForm', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var intakeId = $('#editintakeId').val();

        $.ajax({
            url: '/admin/academic/intake/update/' + intakeId,
            method: 'PUT',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    $('#EditIntakeModal').modal('hide');
                    alert(response.message); // Display the error message sent by the server
                    location.reload(); // Reload the page after update
                } else {
                    alert('Error updating intake');
                }
            },
            error: function() {
                alert('Error updating intake');
            }
        });
    });

    // Handle Delete Intake
    $(document).on('click', '#deleteIntakeBtn', function() {
        var intakeId = $('#editintakeId').val();
        var confirmation = confirm('Are you sure you want to delete this intake?');
        
        if (confirmation) {
            $.ajax({
                url: '/admin/academic/intake/delete/' + intakeId,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#intakeRow-' + intakeId).remove();
                        alert(response.message); // Display the error message sent by the server
                        location.reload(); // Reload the page after update
                    } else {
                        alert('Error deleting intake');
                    }
                },
                error: function() {
                    alert('Error deleting intake');
                }
            });
        }
    });
</script>
@endsection