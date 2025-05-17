<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name_ar');
            $table->string('full_name_en');
            $table->string('personal_email');
            $table->string('corporate_email');
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->string('department');
            $table->foreignId('role')->constrained('roles');
            $table->date('birth_date');
            $table->date('recruitment_date');
            $table->string('passport_number');
            $table->string('national_id');
            $table->string('branch');
            $table->string('biometric');
            $table->enum('gender', ['male', 'female']);
            $table->string('nationality');
            $table->string('cv')->nullable();
            $table->string('certificates')->nullable();
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
