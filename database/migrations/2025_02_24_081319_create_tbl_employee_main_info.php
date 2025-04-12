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
        Schema::create('tbl_employee_main_info', function (Blueprint $table) {
            $table->id('employee_id');

            $table->string('full_name_en');
            $table->string('first_name_en', 30);
            $table->string('second_name_en', 30);
            $table->string('third_name_en', 30);
            $table->string('last_name_en', 30);

            $table->string('full_name_ar');
            $table->string('first_name_ar', 30);
            $table->string('second_name_ar', 30);
            $table->string('third_name_ar', 30);
            $table->string('last_name_ar', 30);



            $table->string('phone_number');
            $table->string('employee_photo');
            $table->enum('status', ['Active', 'Inactive', 'Resigned'])->default('Active');


            $table->string('corporate_email')->unique();
            $table->string('personal_email', 255)->unique();

            $table->foreignId('branch_id');
            $table->integer('department_id'); // Assuming department_id is a branch table foreign key
            $table->integer('user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_employee_main_info');
    }
};
