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
            $table->string('first_name', 30)->nullable();
            $table->string('second_name', 30)->nullable();
            $table->string('third_name', 30)->nullable();
            $table->string('last_name', 30)->nullable();
            $table->string('full_name_ar');
            $table->string('first_name_ar', 30)->nullable();
            $table->string('second_name_ar', 30)->nullable();
            $table->string('third_name_ar', 30)->nullable();
            $table->string('last_name_ar', 30)->nullable();
            $table->integer('phone_number');
            $table->string('employee_photo')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Resigned'])->default('Active');
            $table->string('corporate_email')->unique();
            $table->string('personal_email', 191)->unique();
            $table->foreignId('branch_id');
            $table->integer('department_id');
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
