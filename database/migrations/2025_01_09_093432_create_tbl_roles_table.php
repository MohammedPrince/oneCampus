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
        Schema::create('tbl_roles', function (Blueprint $table) {
            $table->id();
            $table->enum('role_name', ['Administrator', 'Lecturer', 'Chairman', 'Manager',
            'Employee', 'President',' Assistant Dean','Dean',
            'Secretary', 'VPAA', 'APAA', 'Faculty Registrar', 
            'Had of Department',  'Assistant Dean', 'Finance Staff',
            'Librarian', 'Professor'])->default('Employee'); // Add more roles as needed
            
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_roles');
    }
};
