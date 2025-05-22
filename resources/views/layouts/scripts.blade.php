

<script>

    function  Major_data(major) {

        document.getElementById('edit_major_id').value = major.major_id;
        document.getElementById('edit_major_name_en').value = major.major_name_en;
        document.getElementById('edit_major_name_ar').value = major.major_name_ar;
        document.getElementById('edit_major_abbreviation').value = major.major_abbreviation;
        document.getElementById('edit_major_ministry_code').value = major.major_ministry_code;
        document.getElementById('edit_program_mode').value = major.major_mode;
        document.getElementById('edit_credits_required').value = major.credits_required;
        document.getElementById('edit_degree_type').value = major.degree_type;
        document.getElementById('edit_faculty_id').value = major.faculty_id;
        document.getElementById('edit_number_of_semesters').value = major.number_of_semesters;
        document.getElementById('edit_program_duration').value = major.program_duration;

    }

$(document).on('click', '.delete-major', function() {
    console.log('Delete button clicked'); // ✅ Debug
    const majorId = $(this).data('id');

    if (confirm('Are you sure you want to delete this major?')) {
        console.log('Confirmed delete'); // ✅ Debug
        $.ajax({
            url: `/admin/academic/major/delete/${majorId}`,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showAlert('Major deleted successfully!', 'success', '#alertAreaMajors');
                loadMajors();
            },
            error: function(xhr) {
                showAlert('Failed to delete major!', 'danger', '#alertAreaMajors');
                console.log(xhr.responseText); // ✅ Debug
            }
        });
    } else {
        console.log('Deletion cancelled'); // ✅ Debug
    }
});
</script>




<script>


    // --------------------------DataTable scripts----------------
    $(document).ready(function() {
        $('table.table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print'
            ],
            responsive: true,
            lengthMenu: [
                [10, 25, 50, -1 ],
                [10, 25, 50, "All"]
            ],
            language: {
                paginate: {
                    previous: "<i class='fas fa-chevron-left'></i> Prev",
                    next: "Next <i class='fas fa-chevron-right'></i>"
                }
            }
        });
    });

    // --------------------------<!-- Custom Inline Scripts -->----------------
    function filterTable() {
        const searchInput = document.getElementById("tableSearch").value.toLowerCase();
        const tableRows = document.querySelectorAll("#tableBody tr");

        tableRows.forEach((row) => {
            const cells = row.querySelectorAll("td");
            const rowText = Array.from(cells)
                .map((cell) => cell.textContent.toLowerCase())
                .join(" ");
            row.style.display = rowText.includes(searchInput) ? "" : "none";
        });
    }
    // --------------------------User scripts----------------
    // Wait for the DOM to be fully loaded before attaching the event listener
    document.addEventListener('DOMContentLoaded', function() {
        // Change the label based on the selected identification type
        document.getElementById('identification_type').addEventListener('change', function() {
            var idType = this.value;
            var label = document.getElementById('identificationLabel');

            if (idType === 'Passport') {
                label.innerText = 'Passport Number';
            } else if (idType === 'National ID') {
                label.innerText = 'National ID';
            } else if (idType === 'Driving License') {
                label.innerText = 'Driving License Number';
            } else {
                label.innerText = 'Other ID';
            }
        });

        // Handle employee update form submission
        const editEmployeeForm = document.getElementById('editEmployeeForm');
        if (editEmployeeForm) {
            editEmployeeForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#editModal').modal('hide');
                        showAlert('Employee updated successfully!', 'success');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        if (xhr.status === 422) {
                            // Laravel validation error
                            const errors = xhr.responseJSON.errors;
                            let errorMsg = 'Validation Error:\n';
                            $.each(errors, function(key, messages) {
                                errorMsg += `- ${messages[0]}\n`;
                            });
                            showAlert(errorMsg, 'danger');
                        } else {
                            showAlert('Error updating employee.', 'danger');
                        }
                    }
                });
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;

                // Getting all values
                var employeeId = button.getAttribute('data-id');
                var fullNameArabic = button.getAttribute('data-full_name_arabic');
                var fullNameEnglish = button.getAttribute('data-full_name_english');
                var personalEmail = button.getAttribute('data-personal_email');
                var corporateEmail = button.getAttribute('data-corporate_email');
                var phoneNumber = button.getAttribute('data-phone_number');
                var whatsappNumber = button.getAttribute('data-whatsapp_number');
                var department = button.getAttribute('data-department_id');
                var role = button.getAttribute('data-role');
                var birthDate = button.getAttribute('data-birth_date');
                var recruitmentDate = button.getAttribute('data-recruitment_date');
                var identificationType = button.getAttribute('data-identification_type');
                var identificationId = button.getAttribute('data-identification_id');
                var branch = button.getAttribute('data-branch_id');
                var biometric = button.getAttribute('data-biometric');
                var gender = button.getAttribute('data-gender');
                var Nationality = button.getAttribute('data-nationality');
                var cv = button.getAttribute('data-cv');
                var certificate = button.getAttribute('data-certificate');

                // Assign values to modal form
                document.getElementById('editEmployeeId').value = employeeId;
                document.getElementById('editFullNameArabic').value = fullNameArabic;
                document.getElementById('editFullNameEnglish').value = fullNameEnglish;
                document.getElementById('editPersonalEmail').value = personalEmail;
                document.getElementById('editCorporateEmail').value = corporateEmail;
                document.getElementById('editPhoneNumber').value = phoneNumber;
                document.getElementById('editWhatsAppNumber').value = whatsappNumber;
                document.getElementById('editDepartment').value = department;
                document.getElementById('editidentification_id').value = identificationId;
                document.getElementById('editidentification_type').value = identificationType
                    .toLowerCase();
                document.getElementById('editRole').value = role;
                document.getElementById('editBirthDate').value = birthDate;
                document.getElementById('editRecruitmentDate').value = recruitmentDate;
                document.getElementById('editBranch').value = branch;
                document.getElementById('editBiometric').value = biometric;
                document.getElementById('editGender').value = gender.toLowerCase();
                document.getElementById('editNationality').value = Nationality;


                console.log('Raw Identification Type:', identificationType); // Debugging

                // Set identification type and move to top
                var $select = $('#editidentification_type');
                var selectedValue = identificationType.trim();

                // Find and select the option, then move it to the top
                var $selectedOption = $select.find('option').filter(function() {
                    return $(this).val().trim().toLowerCase() === selectedValue.toLowerCase();
                });

                if ($selectedOption.length) {
                    $selectedOption.prop('selected', true);
                    $selectedOption.detach();
                    $select.prepend($selectedOption);
                }

                // Update label for identification
                $('#identificationLabel').text(selectedValue);

                document.getElementById('currentCV').innerText = cv ? cv : 'No CV uploaded';
                document.getElementById('currentCertificate').innerText = certificate ? certificate :
                    'No Certificate uploaded';
                console.log('Identification Type:', identificationType);

                $('#editEmployeeForm').attr('action', '{{ url('admin/user') }}/' + employeeId);
            });
        }


        // Label update on dropdown change
        $('#editidentification_type').on('change', function() {
            $('#identificationLabel').text($(this).val());
        });
    });

    // --------------------------Department Scripts----------------
   $(document).ready(function () {
    // Existing Edit logic...

    // ========================
    // Add Faculty AJAX submit
    // ========================
$('#addFacultyForm').submit(function (e) {
        e.preventDefault();

        const form = $(this);
        const url = form.attr('action');
        const data = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#AddFaculty').modal('hide');
                showAlert('Faculty added successfully!');
                location.reload(); // Or update table dynamically
            },
            error: function (xhr) {
                console.error(xhr);
                if (xhr.status === 422) {
                    // Laravel validation error
                    const errors = xhr.responseJSON.errors;
                    let errorMsg = 'Validation Error:\n';
                    $.each(errors, function (key, messages) {
                        errorMsg += `- ${messages[0]}\n`;
                    });
                    showAlert(errorMsg, 'danger');
                } else {
                    showAlert('Error adding faculty.', 'danger');
                }
            }
        });
    });
  // Delete Faculty via AJAX
    $('.delete-faculty-btn').on('click', function () {
        const facultyId = $(this).data('id');
        const confirmed = confirm("Are you sure you want to delete this faculty?");

        if (!confirmed) return;

        $.ajax({
            url: `/admin/rule/departments/${facultyId}`, // Or use `route('faculty.destroy', facultyId)` in a Blade script block
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                showAlert('Faculty deleted successfully!', 'success');
                location.reload(); // or remove the row from the DOM dynamically
            },
            error: function (xhr) {
                showAlert('Error deleting faculty.', 'danger');
            }
        });
    });


    // ========================
    // Edit Faculty (already added)
    // ========================
    $('.edit-btn').click(function () {
        const id = $(this).data('id');
        $('#editFacultyId').val(id);
        $('#editFacultyEn').val($(this).data('en'));
        $('#editFacultyAr').val($(this).data('ar'));
        $('#editFacultyAbbr').val($(this).data('abbr'));
        $('#editFacultyBranch').val($(this).data('branch'));

        const action = "{{ route('faculty.update', ':id') }}".replace(':id', id);
        $('#editFacultyForm').attr('action', action);
    });

    $('#editFacultyForm').submit(function (e) {
        e.preventDefault();

        const form = $(this);
        const url = form.attr('action');
        const data = form.serialize();

        $.ajax({
            url: url,
            type: 'POST', // Use POST with method spoofing
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function (response) {
                $('#EditFaculty').modal('hide');
                showAlert('Faculty updated successfully!');
                location.reload();
            },
            error: function (xhr) {
                console.error(xhr);
                showAlert('Error updating faculty.', 'danger');
                location.reload();
            }
        });
    });

    // ========================
    // Show alert
    // ========================
    function showAlert(message, type = 'success', target = '#alertArea') {
        const allowedTypes = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        const alertType = allowedTypes.includes(type) ? type : 'success';

        if (alertTimeout) {
            clearTimeout(alertTimeout);
            alertTimeout = null;
        }

        const alertHtml = `
            <div class="alert alert-${alertType} alert-dismissible fade show shadow" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;

        $(target).html(alertHtml);

        // Auto-dismiss after 5 seconds
        alertTimeout = setTimeout(() => {
            $(target).find('.alert').alert('close');
        }, 5000);
    }
});

    // --------------------------Branch Scripts----------------

document.addEventListener("DOMContentLoaded", function () {
    // DELETE handler
    document.querySelectorAll('.delete-branch-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const branchId = this.getAttribute('data-id');

            if (!confirm('Are you sure you want to delete this branch?')) return;

            fetch(`/admin/rule/branch/${branchId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove row from DOM
                    this.closest('tr').remove();

                    // If modal is open, wait until it's hidden
                    const modal = document.querySelector('#editBranchModal');
                    if (modal && $(modal).hasClass('show')) {
                        $(modal).on('hidden.bs.modal', function () {
                            showAlert(data.message, 'success');
                            $(modal).off('hidden.bs.modal'); // Unbind to prevent multiple triggers
                        });
                        $(modal).modal('hide'); // Hide modal
                    } else {
                        // If no modal open, show alert immediately
                        showAlert(data.message, 'success');
                    }
                } else {
                    showAlert('Failed to delete branch.', 'danger');
                }
            })
            .catch(error => {
                console.error('Delete failed:', error);
                showAlert('Something went wrong. Check console.', 'warning');
            });
        });
    });
});

    function editBranch(button) {
        $('#edit_id').val($(button).data('id'));
        $('#edit_name_ar').val($(button).data('branch_name_ar'));
        $('#edit_name_en').val($(button).data('branch_name_en'));
        $('#edit_country').val($(button).data('branch_country'));
        $('#edit_city').val($(button).data('branch_city'));
        $('#edit_address').val($(button).data('branch_address'));
    }

    $(document).ready(function() {
        console.log("Branch form JS loaded ✅");
        $('#addBranchForm').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.post("{{ route('admin.rule.branch.store') }}", formData, function(res) {
                $('#addBranchForm').modal('hide');
                showAlert('Branch Added Successfully');
               setTimeout(() => {
    location.reload();
}, 1500); // W
            }).fail(function(xhr) {
                console.error(xhr.responseText); // Check for validation or server errors
                showAlert('Failed to add branch','danger');
                 setTimeout(() => {
    location.reload();
}, 1500); // W
            });
        });

        $('#editBranchForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#edit_id').val();
            let formData = $(this).serialize() + '&_method=PUT';

            $.post(`/admin/rule/branch/update/${id}`, formData, function() {
             $('#editBranchForm').modal('hide');
                showAlert('Branch Updated Successfully');
                setTimeout(() => {
    location.reload();
}, 1500); // W
            }).fail(function() {
                showAlert('Failed to update branch','danger');
                location.reload();

            });
        });
    });

    // --------------------------Alert Function----------------
let alertTimeout;

function showAlert(message, type = 'success', target = '#alertArea') {
    const allowedTypes = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
    const alertType = allowedTypes.includes(type) ? type : 'success';

    if (alertTimeout) {
        clearTimeout(alertTimeout);
        alertTimeout = null;
    }

    const alertHtml = `
        <div class="alert alert-${alertType} alert-dismissible fade show shadow" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;

    $(target).html(alertHtml);

    // Auto-dismiss after 5 seconds
    alertTimeout = setTimeout(() => {
        $(target).find('.alert').alert('close');
    }, 5000);
}


    // --------------------------Batch Scripts----------------
    $(document).ready(function() {
        fetchBatches();

       function fetchBatches() {
    $.get("{{ route('admin.academic.batch.fetch') }}", function(data) {
        let tbody = '';
        $.each(data, function(i, batch) {
            // Map graduate_status numeric value to text
            let graduateStatusText = '';
            if (batch.graduate_status == 1) {
                graduateStatusText = 'Graduated';
            } else if (batch.graduate_status == 2) {
                graduateStatusText = 'Undergraduated';
            } else {
                graduateStatusText = 'Unknown';
            }

            tbody += `
                <tr>
                    <td style="text-align: center;"><input type="checkbox" class="batchCheckbox"></td>
                    <td style="text-align: center;">${batch.batch}</td>
                    <td style="text-align: center;">${batch.faculty ? batch.faculty.faculty_name_en : 'Faculty data is soft deleted.'}</td>
                    <td style="text-align: center;">${batch.major ? batch.major.major_name_en : 'Major data is soft deleted.'}</td>
                    <td style="text-align: center;">${batch.branch ? batch.branch.branch_name_en : 'Branch data is soft deleted.'}</td>
                    <td style="text-align: center;">${batch.active_sem}</td>
                    <td style="text-align: center;">${batch.max_sem}</td>
                    <td style="text-align: center;">${graduateStatusText}</td>
                    <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm editBatchBtn" data-id="${batch.batch_control_id}">
                        <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
                        </button>
                        <button class="btn btn-sm deleteBatchBtn" data-id="${batch.batch_control_id}">
                        <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="delete">
                        </button>
                    </div>
                    </td>

                </tr>
            `;
        });
        $('#batchTableBody').html(tbody);
    });
}

        $('#addBatchForm').submit(function(e) {
            e.preventDefault();
            $.post("{{ route('admin.academic.batch.store') }}", $(this).serialize(), function() {
                fetchBatches();
                $('#addBatchForm')[0].reset();
                showAlert('Batch Added Successfully','success');
                window.location.reload(); // Refresh the page after adding

            });
        });

        $(document).on('click', '.editBatchBtn', function() {
            const id = $(this).data('id');

            // Send an AJAX request to get the batch data by ID
            $.get(`/admin/academic/batch/${id}/edit`, function(data) {
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
                $.get('/admin/faculty', function(faculties) {
                    let facultyOptions = '<option value="">Select Faculty</option>';
                    $.each(faculties, function(i, faculty) {
                        facultyOptions +=
                            `<option value="${faculty.faculty_id}">${faculty.faculty_name_en}</option>`;
                    });
                    $('#edit_dep').html(facultyOptions);
                    $('#edit_dep').val(data.faculty_id); // now we can set it

                    // Now get the majors for selected faculty
                    $.get(`/admin/academic/faculty/${data.faculty_id}/majors`, function(
                        majors) {
                        let majorOptions =
                            '<option value="">Select Major</option>';
                        $.each(majors, function(index, major) {
                            majorOptions +=
                                `<option value="${major.major_id}">${major.major_name_en}</option>`;
                        });
                        $('#edit_role').html(majorOptions);
                        $('#edit_role').val(data
                        .major_id); // set after options are populated
                    });
                });
                // Show the modal
                $('#Editbatch').modal('show');
            }).fail(function() {
                showAlert('Error fetching batch data.','warning','#alertAreaBatches');
                window.location.reload(); // Refresh the page after adding

            });
        });

        $('#editBatchForm').submit(function(e) {
            e.preventDefault();
            const id = $('#editBatchId').val();
            $.ajax({
                url: `/admin/academic/batch/${id}`,
                method: 'PUT',
                data: $(this).serialize(),
                success: function() {
                    $('#Editbatch').modal('hide');

                    showAlert('Batch Updated Successfully','success','#alertAreaBatches');
                    fetchBatches();
                }
            });
        });

        $(document).on('click', '.deleteBatchBtn', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this batch?')) {
                $.ajax({
                    url: `/admin/academic/batch/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        showAlert('Batch Deleted Successfully' ,'success' ,'#alertAreaBatches');
                        fetchBatches();
                    }
                });
            }
        });
        $('#facultySelect').on('change', function() {
            const facultyId = $(this).val();
            $('#majorSelect').html('<option value="">Loading...</option>');

            if (facultyId) {
                $.ajax({
                    url: `/admin/academic/faculty/${facultyId}/majors`,
                    type: 'GET',
                    success: function(majors) {
                        let options = '<option value="">Select Major</option>';
                        $.each(majors, function(index, major) {
                            options +=
                                `<option value="${major.major_id}">${major.major_name_en}</option>`;
                        });
                        $('#majorSelect').html(options);
                    }
                });
            } else {
                $('#majorSelect').html('<option value="">Select Major</option>');
            }
        });
    });

    $(document).ready(function() {
        // Activate Bootstrap 5 tabs automatically
        var triggerTabList = [].slice.call(document.querySelectorAll('#batch-tab, #control-batch-tab'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        });
    });
    // --------------------------Intake Scripts----------------

    $(document).on('submit', '#addIntakeForm', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: '/admin/academic/intake/store',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    $('#AddIntakeModal').modal('hide');
                    showAlert(response.message);
                    delayedRedirect(window.location.href); // Use delayed redirect
                } else {
                    showAlert('Error adding intake','danger');
                    delayedRedirect(window.location.href);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showAlert('Error adding intake','danger');
                delayedRedirect(window.location.href);
            }
        });
    });

    // Handle Edit Intake
    $(document).on('click', '.editIntake', function() {
        const intakeId = $(this).data('id');

        $.get(`/admin/academic/intake/${intakeId}/edit`, function(data) {
            $('#editintakeId').val(data.intake_id);
            $('#editintakeNameEn').val(data.intake_name_en);
            $('#editintakeNameAr').val(data.intake_name_ar);
            $('#EditIntakeModal').modal('show');
        }).fail(function() {
            showAlert('Error fetching intake data.','warning');

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
                    showAlert(response.message);
                    delayedRedirect(window.location.href);
                } else {
                    showAlert('Error updating intake','danger');
                    delayedRedirect(window.location.href);
                }
            },
            error: function() {
                showAlert('Error updating intake','warning');
                delayedRedirect(window.location.href);
            }
        });
    });

    // Handle Delete Intake
 $(document).on('click', '.deleteIntakeBtn', function(e) {
    e.preventDefault();
    var intakeId = $(this).data('id');
    var confirmation = confirm('Are you sure you want to delete this intake?');

    if (confirmation) {
        $.ajax({
            url: '/admin/academic/intake/' + intakeId,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#intakeRow-' + intakeId).remove();
                    showAlert(response.message,'success');
                    delayedRedirect(window.location.href);
                } else {
                    showAlert('Intake Data Not Found','warning');
                    delayedRedirect(window.location.href);
                }
            },
            error: function(xhr) {
                showAlert('An error occurred while deleting the intake.','warning');
                delayedRedirect(window.location.href);
            }
        });
    }
});

    // --------------------------major scripts----------------
    // Handle the Add Major Form
    $('#add-major-form').on('submit', function(event) {
        event.preventDefault();

        // Validate form fields
        let isValid = true;
        let errorFields = [];

        // Check each required field
        $('#add-major-form [required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                errorFields.push($(this).attr('name'));
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            let errorMessage = 'Please fill in the following required fields:\n';
            errorFields.forEach(field => {
                errorMessage += `- ${field.replace(/_/g, ' ').toUpperCase()}\n`;
            });
            showAlert(errorMessage, 'warning');
            return;
        }

        // Prepare form data
        let formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // Send AJAX request
        $.ajax({
            url: '{{ route('admin.academic.major.store') }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Reset form and remove validation classes
                $('#add-major-form')[0].reset();
                $('#add-major-form .is-invalid').removeClass('is-invalid');
                $('#add-major-form .invalid-feedback').hide();

                showAlert('Major added successfully!', 'success');
                loadMajors();

                Reload page after 2 seconds
                setTimeout(() => {
                    window.location.reload();
                }, 5000);
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                if (xhr.status === 422) {
                    // Validation errors from server
                    const errors = xhr.responseJSON.errors;
                    let errorMsg = 'Validation Errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMsg += `- ${errors[key][0]}\n`;
                        // Add invalid class to the corresponding input
                        $(`#${key}`).addClass('is-invalid');
                    });
                    showAlert(errorMsg, 'danger');
                } else {
                    showAlert('Error: ' + (xhr.responseJSON?.message || 'Failed to add major'), 'danger');
                }
            }
        });
    });

    // Handle Edit Major Form Submission
    $('#edit-major-form').on('submit', function(event) {
        event.preventDefault();
        const majorId = $('#edit_major_id').val();

        alert(majorId);
        // Validate form fields
        let isValid = true;
        let errorFields = [];

        // Check each required field
        $('#edit-major-form [required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                errorFields.push($(this).attr('name'));
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            let errorMessage = 'Please fill in the following required fields:\n';
            errorFields.forEach(field => {
                errorMessage += `- ${field.replace(/_/g, ' ').toUpperCase()}\n`;
            });
            showAlert(errorMessage, 'warning', '#alertAreaMajors');
            return;
        }

        // Prepare form data
        let formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('_method', 'PUT');

        // Send AJAX request
        $.ajax({
            url: `/admin/academic/major/update/${majorId}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Reset form and remove validation classes
                $('#edit-major-form')[0].reset();
                $('#edit-major-form .is-invalid').removeClass('is-invalid');
                $('#edit-major-form .invalid-feedback').hide();

                $('#Editprogram').modal('hide');
                showAlert('Major updated successfully!', 'success', '#alertAreaMajors');
                loadMajors();

                // Reload page after 2 seconds
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            },
            error: function(xhr) {
                console.error('Error:', xhr);
                if (xhr.status === 422) {
                    // Validation errors from server
                    const errors = xhr.responseJSON.errors;
                    let errorMsg = 'Validation Errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMsg += `- ${errors[key][0]}\n`;
                        // Add invalid class to the corresponding input
                        $(`#edit_${key}`).addClass('is-invalid');
                    });
                    showAlert(errorMsg, 'danger', '#alertAreaMajors');
                } else {
                    showAlert('Error: ' + (xhr.responseJSON?.message || 'Failed to update major'), 'danger', '#alertAreaMajors');
                }
            }
        });
    });

    // Load Majors for the table
    function loadMajors() {
        $.ajax({
            url: '{{ route('admin.academic.major.data') }}', // Get data through AJAX
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
                                 <div class="d-flex gap-1">
                                <button class ="btn btn-sm" onclick="editMajor(${major.major_id})" style="" data-bs-toggle="modal" data-bs-target="#Editprogram">
                                    <img src="{{ asset('assets/icons/mage_edit.png') }}" class="action-icon" alt="Edit">
                                </button>
                            <button class="btn btn-sm delete-major" data-id="${major.major_id}"> <img src="{{ asset('assets/icons/trash-fill (1).svg') }}" class="action-icon" alt="Delete" /></button>
                       </div>

                            </td>
                        </tr>
                    `);
                    });
                } else {
                    console.error("Error: Majors data is missing or undefined in the response.");
                    window.location.reload(); // Refresh the page after adding

                }
            },
            error: function(xhr) {
                showAlert('Error fetching major data','warning');
                window.location.reload(); // Refresh the page after adding

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
                showAlert('Error fetching form edit data','warning');
                window.location.reload(); // Refresh the page after adding

            }
        });
    }



    // $(document).on('click', '.delete-major', function() {
    //     const majorId = $(this).data('id');
    //     if (confirm('Are you sure you want to delete this major?')) {
    //         $.ajax({
    //             url: `/admin/academic/major/delete/${majorId}`,
    //             type: 'DELETE',
    //             data: {
    //                 _token: $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(response) {
    //               showAlert('Major deleted successfully!', 'success', '#alertAreaMajors');
    //                 loadMajors(); // Refresh the list
    //             },
    //             error: function(xhr) {
    //                showAlert('failed to delte major!', 'danger', '#alertAreaMajors');
    //                 window.location.reload(); // Refresh the page after adding

    //             }
    //         });
    //     }
    // });
    //-----------------------student scripts-----------
    $(document).ready(function() {
        // Initialization code here
        console.log('Student dashboard loaded');
    });

</script>
