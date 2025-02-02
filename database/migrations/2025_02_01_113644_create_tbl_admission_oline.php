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
        Schema::create('tbl_admission_oline', function (Blueprint $table) {
            $table->id('admission_id');  // Only one auto increment field, this is the primary key
        
            // $table->unique('university_id');
            $table->integer('university_id');
        
            $table->enum('application_level', ['Undergraduate', 'Postgraduate'])
                ->nullable()->default('Undergraduate');
        
            $table->enum('admission_Status', ['Pending', 'Approved', 'Rejected'])
                ->nullable()
                ->default('Pending');
        
            // Remove 'auto_increment' from the other fields that should not have it
            $table->string('student_id', 15);
            $table->string('first_name', 100);
            $table->string('second_name', 100);
            $table->string('third_name', 100);
            $table->string('last_name', 100);
        
            $table->string('first_name_ar', 100);
            $table->string('second_name_ar', 100);
            $table->string('third_name_ar', 100);
            $table->string('last_name_ar', 100);
            $table->string('student_photo', 255);
        
            $table->tinyInteger('activity_status');  // Removed auto_increment
            $table->string('batch', 20);
            $table->integer('current_semester' );  // Removed auto_increment
            $table->integer('branch_id');         // Removed auto_increment
            $table->integer('faculty_id');        // Removed auto_increment
            $table->integer('major_id');          // Removed auto_increment
            $table->enum('student_study_mode', ['Physical', 'Online', 'Mixed'])
                ->nullable()
                ->default('physical');
        
            $table->integer('gender');              // Removed auto_increment
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])
                ->nullable()
                ->default('O+');
            $table->integer('military_code');      // Removed auto_increment
            $table->date('date_of_birth');
            $table->string('nationality', 11);
            $table->string('nationality_2', 11)->nullable();
            $table->string('student_address', 255);
            $table->string('student_town', 100);
            $table->string('student_State', 100);
            $table->string('student_country', 100);
            $table->string('phone_number', 20);
            $table->string('student_email', 100)->nullable();
            $table->string('whatsapp_number', 20)->nullable();
            $table->string('facebook_link', 255)->nullable();
            $table->string('twitter_id', 255)->nullable();
        
            $table->enum('identification_id_type', ['National ID', 'Passport', 'Driver’s License'])
                ->nullable()
                ->default('National ID');
        
            $table->string('identification_id', 50);
            $table->date('identification_id_issuedate');
            $table->date('identification_id_expireddate');
            $table->string('identification_id_issue_place', 100);
            $table->string('identification_id_issue_upload', 100);
            $table->string('place_of_residence', 100);
        
            $table->string('visa_id', 100)->nullable();
            $table->enum('visa_type', ['Tourist', 'Business', 'Student', 'Work', 'Transit', 'Other'])
                ->nullable()
                ->default('student');
            $table->date('visa_expired_date');
        
            $table->enum('religion', ['Islam', 'Christianity', 'Judaism', 'Hinduism', 'Buddhism', 'Sikhism', 'Other'])
                ->nullable()
                ->default('Islam');
        
            $table->tinyInteger('sibling')->nullable();  // Removed auto_increment
            $table->string('guardian_name')->nullable();
            $table->enum('guardian_relationship', ['Father', 'Mother', 'Uncle', 'Aunt', 'Grandfather', 'Grandmother', 'Other'])
                ->nullable()
                ->default('Father');
            $table->integer('guardian_gender')->nullable();
            $table->string('ocupation', 100);
            $table->string('work_location', 255)->nullable();
            $table->string('guardian_address', 255)->nullable();
            $table->string('guardian_email', 255)->nullable();
            $table->string('guardian_phone_number', 255)->nullable();
        
            $table->string('school_name', 100);
            $table->string('school_place', 100);
            $table->string('certificate_no', 50);
            $table->date('certicate_issue_date');
            $table->decimal('pass_percentage', 5, 2);
            $table->string('no_of_subjects', 11);
            $table->string('failed_subjects', 11);
            $table->string('student_certificate_upload', 255);
        
            $table->enum('certificate_type_code', ['Diploma', 'SDN High School', 'Arabic High School', 'IGCSE', 'Other'])
                ->default('SDN High School')
                ->nullable();
        
            // Removed auto_increment from certificate_major_code
            $table->enum('certificate_major_code', ['Science', 'Math', 'Arts', 'Engineering', 'Medicine', 'Law', 'Other'])
                ->nullable();
        
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admission_oline');
    }
};
