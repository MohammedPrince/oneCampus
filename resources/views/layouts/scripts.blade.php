@section('script')
//Admin Site Scripts
<script>
  // --------------------------User scripts----------------
document.addEventListener('DOMContentLoaded', function () {
      var editModal = document.getElementById('editModal');
      if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget;
  
          // Getting all values
          var employeeId = button.getAttribute('data-id');
          var fullNameArabic = button.getAttribute('data-full_name_arabic');
          var fullNameEnglish = button.getAttribute('data-full_name_english');
          var personalEmail = button.getAttribute('data-personal_email');
          var corporateEmail = button.getAttribute('data-corporate_email');
          var phoneNumber = button.getAttribute('data-phone_number');
          var whatsappNumber = button.getAttribute('data-whatsapp_number');
          var department = button.getAttribute('data-department');
          var role = button.getAttribute('data-role');
          var birthDate = button.getAttribute('data-birth_date');
          var recruitmentDate = button.getAttribute('data-recruitment_date');
          var identificationType = button.getAttribute('data-identification_type');
          var identificationId = button.getAttribute('data-identification_id');
          var branch = button.getAttribute('data-branch');
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
          document.getElementById('editidentification_type').value = identificationType.toLowerCase();
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
        var $selectedOption = $select.find('option').filter(function () {
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
          document.getElementById('currentCertificate').innerText = certificate ? certificate : 'No Certificate uploaded';
          console.log('Identification Type:', identificationType);

          $('#editEmployeeForm').attr('action', '{{ url('admin/user') }}/' + employeeId);
        });
      }


      // Label update on dropdown change
      $('#editidentification_type').on('change', function () {
          $('#identificationLabel').text($(this).val());
      });
    });

     // --------------------------Department Scripts----------------
  $(document).ready(function () {
    // Dynamically fill edit form
    $('.edit-btn').click(function () {
      const id = $(this).data('id');
      $('#editFacultyId').val(id);
      $('#editFacultyEn').val($(this).data('en'));
      $('#editFacultyAr').val($(this).data('ar'));
      $('#editFacultyAbbr').val($(this).data('abbr'));
      $('#editFacultyBranch').val($(this).data('branch'));

      // Set form action
      const action = "{{ route('faculty.update', ':id') }}".replace(':id', id);
      $('#editFacultyForm').attr('action', action);
    });

    // AJAX submit
    $('#editFacultyForm').submit(function (e) {
      e.preventDefault();

      const form = $(this);
      const url = form.attr('action');
      const data = form.serialize();

      $.ajax({
        url: url,
        type: 'PUT',
        data: data,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'X-HTTP-Method-Override': 'PUT'
        },
        success: function (response) {
          alert('Faculty updated successfully!');
          location.reload(); // Or just update table row
        },
        error: function (xhr) {
          console.error(xhr);
          alert('Error updating faculty.');
        }
      });
    });
  });

    // --------------------------Branch Scripts----------------
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

  // --------------------------Batch Scripts----------------
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
                 window.location.reload(); // Refresh the page after adding

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
  // --------------------------Intake Scripts----------------

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
  // --------------------------major scripts----------------
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