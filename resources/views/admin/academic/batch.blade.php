@extends('layouts.master')
@section('content')
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
                </div>
            </div>
        </div>
    </nav>
    <div class="row nav-tabs" role="tablist" style="border: none; width: 30vw;">

        <!-- Use href with IDs and remove JavaScript attributes -->


        <a class="nav-links active" href="#batch" id="batch-tab"data-bs-toggle="tab" role="tab" aria-controls="batch"
            aria-selected="true">Batch</a>
        <a class="nav-links" href="#batchcontrol" id="control-batch-tab"data-bs-toggle="tab" role="tab"
            aria-controls="batchcontrol" aria-selected="true">Batch Control</a>
    </div>

    <!-- Tab content -->
    <div class="tab-content">
        <!-- Single User Tab -->

        <div id="batch" class="tab-pane fade show active" role="tabpanel" aria-labelledby="single-user-tab">
            <div class="container mt-5">
                <h1 class="mb-4">Add New Batch</h1>
                <form class="row needs-validation" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fullNameArabic" class="form-label">Batch</label>
                            <input type="text" class="form-control" id="fullNameArabic" required>
                            <div class="invalid-feedback">Please enter the batch.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fullNameArabicStatus" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example ">

                                <option value="1">Graduated</option>
                                <option value="2">Undergraduated</option>

                            </select>

                            <div class="invalid-feedback">Please enter Graduated or not.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fullNameArabicStatus" class="form-label">Branch</label>
                            <select class="form-select" aria-label="Default select example">

                                <option value="1">ALL</option>
                                <option value="2">Khartoum</option>
                                <option value="2">Egypt</option>

                            </select>

                            <div class="invalid-feedback">Please select the branch .</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department" class="form-label">Faculty</label>
                            <select class="form-select" id="dep" required style="width: 30vw;">
                                <option value="">Select Faculty</option>
                                <option value="Chairman">IT</option>
                                <option value="President">BA</option>
                            </select>
                            <div class="invalid-feedback">Please select a Faculty.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Major</label>
                            <select class="form-select" id="role" required style="width: 30vw;">
                                <option value="">Select Major</option>
                                <option value="Chairman">IT</option>
                                <option value="President">BA</option>
                            </select>
                            <div class="invalid-feedback">Please select a Major.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Max Semester</label>
                            <input type="tel" class="form-control" id="phoneNumber" required>
                            <div class="invalid-feedback">Please enter Max Sem.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="whatsAppNumber" class="form-label">Active Semester</label>
                            <input type="tel" class="form-control" id="whatsAppNumber" required>
                            <div class="invalid-feedback">Please enter Active Sem.</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline w-100">Submit</button>
                </form>
            </div>
        </div>

        <!-- Bulk User Tab -->
        <div id="batchcontrol" class="tab-pane fade">
            <h4>Batches</h4>
            <div class="container my-4">
                <!-- Search bar -->
                <div class="mb-3">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search..."
                        onkeyup="filterTable()" style="width: 30vw;" />
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><input type="checkbox" id="selectAll"></th>
                                <th style="text-align: center;">Batch</th>
                                <th style="text-align: center;">Faculty</th>
                                <th style="text-align: center;">Major</th>
                                <th style="text-align: center;">Branch</th>
                                <th style="text-align: center;">Active Semester</th>
                                <th style="text-align: center;">Max Semester</th>
                                <th style="text-align: center;">Graduate Status</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <td style="text-align: center;"><input type="checkbox" class="employeeCheckbox" /></td>
                                <td style="text-align: center;">2022</td>
                                <td style="text-align: center;">IT</td>
                                <td style="text-align: center;">IT</td>
                                <td style="text-align: center;">Khartoum</td>
                                <td style="text-align: center;">5</td>
                                <td style="text-align: center;">10</td>
                                <td style="text-align: center; justify-items: center; align-items: center;">Undergraduated
                                </td>
                                <td style="text-align: center;">
                                    <button onclick="" style="border: none; background-color: transparent;"
                                        data-bs-toggle="modal" data-bs-target="#Editbatch">
                                        <img src="{{ asset('assets/icons/mage_edit.png') }}" alt="Edit">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="Editbatch" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Batch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row needs-validation" novalidate>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fullNameArabic" class="form-label">Batch</label>
                                <input type="text" class="form-control" id="fullNameArabic" required>
                                <div class="invalid-feedback">Please enter the batch.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fullNameArabicStatus" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example ">

                                    <option value="1">Graduated</option>
                                    <option value="2">Undergraduated</option>

                                </select>

                                <div class="invalid-feedback">Please enter Graduated or not.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="fullNameArabicStatus" class="form-label">Branch</label>
                                <select class="form-select" aria-label="Default select example">

                                    <option value="1">ALL</option>
                                    <option value="2">Khartoum</option>
                                    <option value="2">Egypt</option>

                                </select>

                                <div class="invalid-feedback">Please select the branch .</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="department" class="form-label">Faculty</label>
                                <select class="form-select" id="dep" required style="width: 30vw;">
                                    <option value="">Select Faculty</option>
                                    <option value="Chairman">IT</option>
                                    <option value="President">BA</option>
                                </select>
                                <div class="invalid-feedback">Please select a Faculty.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Major</label>
                                <select class="form-select" id="role" required style="width: 30vw;">
                                    <option value="">Select Major</option>
                                    <option value="Chairman">IT</option>
                                    <option value="President">BA</option>
                                </select>
                                <div class="invalid-feedback">Please select a Major.</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label">Max Semester</label>
                                <input type="tel" class="form-control" id="phoneNumber" required>
                                <div class="invalid-feedback">Please enter Max Sem.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="whatsAppNumber" class="form-label">Active Semester</label>
                                <input type="tel" class="form-control" id="whatsAppNumber" required>
                                <div class="invalid-feedback">Please enter Active Sem.</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline w-100">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <script>
        // Add event listeners to the navigation links
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll(".nav-links");
            const tabPanes = document.querySelectorAll(".tab-pane");

            navLinks.forEach((link) => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();

                    // Remove the 'active' class from all navigation links
                    navLinks.forEach((link) => link.classList.remove("active"));

                    // Remove the 'show active' class from all tab panes
                    tabPanes.forEach((pane) => pane.classList.remove("show", "active"));

                    // Add 'active' class to the clicked navigation link
                    this.classList.add("active");

                    // Get the target tab ID from the href attribute
                    const targetTab = this.getAttribute("href");

                    // Add 'show active' class to the corresponding tab pane
                    document.querySelector(targetTab).classList.add("show", "active");
                });
            });
        });
    </script>
@endsection
