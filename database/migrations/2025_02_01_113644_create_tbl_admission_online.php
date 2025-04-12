<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_admission_online', function (Blueprint $table) {
            $table->id('admission_id');

            $table->string('university_id')->unique();
            $table->enum('application_level', ['Undergraduate', 'Postgraduate'])->default('Undergraduate');
            $table->enum('admission_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('admission_type', ['Online', 'Offline'])->default('Online');

            $table->enum('admission_fee_payment_status', ['Pending', 'Paid', 'Failed'])->default('Pending');
            $table->enum('admission_fee_payment_method', ['Cash', 'Bank Transfer', 'Credit Card', 'Debit Card', 'Other'])->default('Cash');
            $table->decimal('admission_fee', 10, 2)->default(0);
            $table->decimal('admission_fee_paid', 10, 2)->default(0);
            $table->decimal('admission_fee_balance', 10, 2)->default(0);
            $table->string('admission_fee_payment_receipt', 255)->nullable();
            $table->date('admission_fee_payment_date')->nullable();
            $table->string('admission_fee_payment_method_details', 255)->nullable();
            $table->string('admission_fee_payment_note_ar', 255)->nullable();
            $table->string('admission_fee_payment_note_en', 255)->nullable();

            $table->string('student_id', 15)->unique();
            
            $table->string('first_name_en', 100);
            $table->string('second_name_en', 100);
            $table->string('third_name_en', 100);
            $table->string('last_name_en', 100);

            $table->string('first_name_ar', 100);
            $table->string('second_name_ar', 100);
            $table->string('third_name_ar', 100);
            $table->string('last_name_ar', 100);
            $table->string('student_photo', 255);

            $table->tinyInteger('activity_status');
            $table->string('batch', 20);
            $table->integer('current_semester');
            $table->integer('branch_id');
            $table->integer('faculty_id');
            $table->integer('major_id');
            $table->enum('student_study_mode', ['Physical', 'Online', 'Mixed'])->default('Physical');

            $table->enum('gender', ['Male', 'Female']);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->integer('military_code')->nullable();
            $table->date('date_of_birth');
            $table->string('nationality', 11);
            $table->string('nationality_2', 11)->nullable();
            $table->string('student_address', 255);
            $table->string('student_town', 100);
            $table->string('student_state', 100);
            $table->string('student_country', 100);

            // Add ->unique(); to[student_email,phone_number] If the application 
            //  is filled out by a parent with more than one student at the university
            $table->string('student_email', 100);
            $table->string('phone_number', 20); 
            $table->string('whatsapp_number', 20)->nullable()->unique();
            $table->string('facebook_link', 255)->nullable()->unique();
            $table->string('twitter_id', 255)->nullable()->unique();

            $table->enum('identification_id_type', ['National ID', 'Passport', 'Driver’s License'])->default('National ID');
            $table->string('identification_id', 50)->unique();
            $table->date('identification_id_issue_date');
            $table->date('identification_id_expired_date');
            $table->string('identification_id_issue_place', 100);
            $table->string('identification_id_upload', 100);
            $table->string('place_of_residence', 100);
            $table->string('visa_id', 100)->nullable();
            $table->enum('visa_type', ['Tourist', 'Business', 'Student', 'Work', 'Transit', 'Other'])->nullable()->default('Student');
            $table->date('visa_expired_date')->nullable();

            $table->enum('religious', ['Islam', 'Christianity', 'Judaism', 'Hinduism', 'Buddhism', 'Sikhism', 'Other'])->default('Islam');
            $table->tinyInteger('sibling')->nullable();
            $table->string('guardian_name')->nullable();
            $table->enum('guardian_relationship', ['Father', 'Mother', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother', 'Other'])->default('Father');
            $table->enum('guardian_gender', ['Male', 'Female'])->nullable();
            $table->string('occupation', 100)->nullable();;
            $table->string('work_location', 255)->nullable();;
            $table->string('guardian_address', 255)->nullable();
            $table->string('guardian_email', 255)->nullable();
            $table->string('guardian_phone_number', 255)->nullable();

            $table->string('school_name', 100);
            $table->string('school_place', 100);
            $table->string('certificate_no', 50)->unique();;
            $table->date('certificate_issue_date');
            $table->enum('certificate_type_code', ['Diploma', 'SDN High School', 'Arabic High School', 'IGCSE', 'Other'])->default('SDN High School');
            $table->enum('certificate_major_code', ['Science', 'Math', 'Arts', 'Engineering', 'Medicine', 'Law', 'Other']);
            $table->decimal('pass_percentage', 5, 2);
            $table->integer('no_of_subjects');
            $table->integer('failed_subjects')->nullable(); //there might not be any failed subjects
            $table->string('student_certificate_upload', 255);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_admission_online');
    }
};
