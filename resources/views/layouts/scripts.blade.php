

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


             function  Batch_data(batch) {
                document.getElementById('editBatchId').value = batch.batch_control_id;
                document.getElementById('edit_batch').value = batch.batch;
                document.getElementById('edit_graduate_status').value = batch.graduate_status;
                document.getElementById('edit_max_sem').value = batch.max_sem;
                document.getElementById('edit_active_sem').value = batch.active_sem;
                document.getElementById('edit_dep').value = batch.faculty_id;
                document.getElementById('edit_role').value = batch.major_id;
                document.getElementById('edit_branch_id').value = batch.branch_id; // don't forget this too for the branch_id
                // $('#Editbatch').modal('show');
                $.get('/admin/faculty', function(faculties) {
                    let facultyOptions = '<option value="">Select Faculty</option>';
                    $.each(faculties, function(i, faculty) {
                        facultyOptions +=
                            `<option value="${faculty.faculty_id}">${faculty.faculty_name_en}</option>`;
                    });
                    $('#edit_dep').html(facultyOptions);
                    $('#edit_dep').val(batch.faculty_id); // now we can set it

                    // Now get the majors for selected faculty
                    $.get(`/admin/academic/faculty/${batch.faculty_id}/majors`, function(
                        majors) {
                        let majorOptions =
                            '<option value="">Select Major</option>';
                        $.each(majors, function(index, major) {
                            majorOptions +=
                                `<option value="${major.major_id}">${major.major_name_en}</option>`;
                        });
                        $('#edit_role').html(majorOptions);
                        $('#edit_role').val(batch
                        .major_id); // set after options are populated
                    });
                });
            }



            function  Intake_data(intake) {
                document.getElementById('editintakeId').value = intake.intake_id;
                document.getElementById('editintakeNameEn').value = intake.intake_name_en;
                document.getElementById('editintakeNameAr').value = intake.intake_name_ar;
            }

            function  Faculty_data(faculty) {
                document.getElementById('editFacultyId').value = faculty.faculty_id;
                document.getElementById('editFacultyEn').value = faculty.faculty_name_en;
                document.getElementById('editFacultyAr').value = faculty.faculty_name_ar;
                document.getElementById('editFacultyAbbr').value = faculty.abbreviation;
                document.getElementById('editFacultyBranch').value = faculty.branch_id;
            }

            function  Branch_data(branch) {
                document.getElementById('edit_id').value = branch.branch_id;
                document.getElementById('edit_name_ar').value = branch.branch_name_ar;
                document.getElementById('edit_name_en').value = branch.branch_name_en;
                document.getElementById('edit_country').value = branch.country_name_en;
                document.getElementById('edit_city').value = branch.branch_city;
                document.getElementById('edit_address').value = branch.branch_address;
            }



            // function  User_data(user) {
            //     document.getElementById('editEmployeeId').value = user.employee_id;
            //     document.getElementById('editFullNameArabic').value = user.full_name_arabic;
            //     document.getElementById('editFullNameEnglish').value = user.full_name_english;
            //     document.getElementById('editPersonalEmail').value = user.personal_email;
            //     document.getElementById('editCorporateEmail').value = user.corporate_email;
            //     document.getElementById('editPhoneNumber').value = user.phone_number;
            //     document.getElementById('editWhatsAppNumber').value = user.whatsapp_number;
            //     document.getElementById('editDepartment').value = user.department_id;
            //     document.getElementById('editidentification_id').value = user.identification_id;
            //     document.getElementById('editidentification_type').value = user.identification_type.toLowerCase();
            //     document.getElementById('editRole').value = user.role;
            //     document.getElementById('editBirthDate').value = user.birth_date;
            //     document.getElementById('editRecruitmentDate').value = user.recruitment_date;
            //     document.getElementById('editBranch').value = user.branch_id;
            //     document.getElementById('editBiometric').value = user.biometric;
            //     document.getElementById('editGender').value = user.gender;
            //     document.getElementById('editNationality').value = user.nationality;
            //     document.getElementById('editReligion').value = user.religion;
            //     document.getElementById('editBloodType').value = user.blood_type;
            //     document.getElementById('editMaritalStatus').value = user.marital_status;
            //     document.getElementById('editEmergencyContact').value = user.emergency_contact;
            //     document.getElementById('editEmergencyContactRelationship').value = user.emergency_contact_relationship;
            //     document.getElementById('editEmergencyContactNumber').value = user.emergency_contact_number;
            //     document.getElementById('editEmergencyContactAddress').value = user.emergency_contact_address;
            //     document.getElementById('editEmergencyContactCity').value = user.emergency_contact_city;
            //     document.getElementById('editEmergencyContactCountry').value = user.emergency_contact_country;
            // }



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


        //         $('#edit_dep').on('change', function() {
        //     const facultyId = $(this).val();
        //     $('#majorSelect').html('<option value="">Loading...</option>');

        //     if (facultyId) {
        //         $.ajax({
        //             url: `/admin/academic/faculty/${facultyId}/majors`,
        //             type: 'GET',
        //             success: function(majors) {
        //                 let options = '<option value="">Select Major</option>';
        //                 $.each(majors, function(index, major) {
        //                     options +=
        //                         `<option value="${major.major_id}">${major.major_name_en}</option>`;
        //                 });
        //                 $('#edit_role').html(options);
        //             }
        //         });
        //     } else {
        //         $('#edit_role').html('<option value="">Select Major</option>');
        //     }
        // });


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





</script>




{{-- <script>

    //-----------------------student scripts-----------
    $(document).ready(function() {
        // Initialization code here
        console.log('Student dashboard loaded');
    });

</script> --}}
