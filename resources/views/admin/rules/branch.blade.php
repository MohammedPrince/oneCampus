@extends('layouts.master')
@section('content')

<nav class="navbar navbar-expand justify-content-center" style="background-color: transparent;">
    <div class="container-fluid">
        <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-center w-100">
                <a class="nav-link {{ request()->is('admin/rule/list') ? 'active' : ''}}" href="{{route('admin.rule.list')}}" data-page="roles">Rules</a>
                <a class="nav-link {{ request()->is('admin/rule/departments') ? 'active' : ''}}" href="{{route('admin.rule.dept')}}" data-page="department">Departments</a>
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

    <div class="">
        <div class="mb-3">
            <input type="text" id="tableSearch" class="form-control" placeholder="Search..." onkeyup="filterTable()" style="width: 30vw;" />
        </div>

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
                            <img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit">
                        </button>

                            <form action="{{ route('admin.rule.branch.destroy', $branch->branch_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this branch?');" style="display:inline;">
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
                    <button type="submit" class="btn btn-outline w-100">Update</button>
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
                            <input type="text" name="branch_city" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="branch_address" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline w-100">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts') 
<script>
function editBranch(button) {
    $('#edit_id').val($(button).data('id'));
    $('#edit_name_ar').val($(button).data('branch_name_ar'));
    $('#edit_name_en').val($(button).data('branch_name_en'));
    $('#edit_country').val($(button).data('branch_country'));
    $('#edit_city').val($(button).data('branch_city'));
    $('#edit_address').val($(button).data('branch_address'));
}

$(document).ready(function () {
    console.log("Branch form JS loaded ✅"); 
    $('#addBranchForm').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.post("{{ route('admin.rule.branch.store') }}", formData, function (res) {
            alert('Branch Added Successfully');
            location.reload();
        }).fail(function (xhr) {
            console.error(xhr.responseText); // Check for validation or server errors
            alert('Failed to add branch');
        });
    });

    $('#editBranchForm').on('submit', function (e) {
        e.preventDefault();
        let id = $('#edit_id').val();
        let formData = $(this).serialize() + '&_method=PUT';

        $.post(`/admin/rule/branch/update/${id}`, formData, function () {
            alert('Branch Updated Successfully');
            location.reload();
        }).fail(function () {
            alert('Failed to update branch');
        });
    });
});

</script>
@endsection
