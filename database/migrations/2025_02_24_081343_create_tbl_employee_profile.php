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
        Schema::create('tbl_employee_profile', function (Blueprint $table) {
            $table->id('employee_profile_id');

            // Add foreign key relationship to employee_main_info table
            // - onDelete('restrict') prevents deletion of referenced records
            // - onUpdate('cascade') automatically updates references when parent record is updated
            // $table->foreignId('employee_id')->constrained('tbl_employee_main_info', 'employee_id')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('gender', ['Male', 'Female']);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('nationality', 11);
            $table->string('nationality_2', 11)->nullable();
            $table->enum('religious', ['Islam', 'Christianity', 'Judaism', 'Hinduism', 'Buddhism', 'Sikhism', 'Other'])->default('Islam');
            $table->date('date_of_birth');

            $table->string('whatsapp_number', 15)->nullable();
            $table->string('personal_email', 255)->unique();
            $table->string('facebook_account', 255)->nullable()->unique();
            $table->string('twitter_account', 255)->nullable()->unique();
            $table->string('instgram_account', 255)->nullable()->unique();
            $table->string('address', 255);
            $table->string('town', length: 100);
            $table->string('state', 100);
            $table->integer('country');
            $table->string('place_of_residence', 255);
            $table->string('office_location', 255);

            $table->enum('identification_id_type', ['National ID', 'Passport', 'Driving License', 'Other'])->default('National ID');
            $table->string('identification_id', 50)->unique();
            $table->date('identification_id_issue_date');
            $table->date('identification_id_expired_date');
            $table->string('identification_id_issue_place', 255);
            $table->string('identification_id_upload', 255);

            $table->string('visa_id', 100)->nullable();
            // To ensure proper uniqueness including NULL values
            $table->unique('visa_id', 'unique_visa_id_when_not_null');
            $table->enum('visa_type', ['Tourist', 'Business', 'Student', 'Work', 'Transit', 'Temp', 'Other'])->default('Work'); //  visa_expired_date to be nullable since visa is optional
            $table->date('visa_expired_date')->nullable();

            $table->enum('employment_type', ['Full-Time', 'Part-Time', 'Contract'])->default('Full-Time');
            $table->date('hire_date');
            $table->date('end_date')->nullable()->default(NULL);
            $table->enum('position_level', ['Entry Level', 'Junior', 'Mid Level', 'Senior', 'Lead', 'Manager', 'Director', 'Other'])->default('Entry Level');
            $table->decimal('salary', 10, 2)->unsigned(); // Add validation for salary to prevent negative values
            $table->enum('military_code', ['Complete', 'Postponed', 'None'])->default('Complete');

            // Add [marital_status, spouse_nationality mspouse_name] as it's important employee information
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->default('Single');
            $table->enum('employment_status', ['Active', 'Inactive', 'Resigned', 'Retired', 'Terminated', 'Other'])->default('Active');
            $table->string('spouse_name', 100)->nullable();
            $table->string('spouse_nationality', 100)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_employee_profile');
    }
};
