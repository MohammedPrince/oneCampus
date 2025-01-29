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
        Schema::create('tbl_major', function (Blueprint $table) {
            $table->id('major_id'); // Primary key
            $table->string('major_name');
            $table->string('major_abbreviation');
            $table->integer('degree_type');
            $table->integer('program_duration');
            $table->integer('number_of_sem');
            $table->integer('credits_required');
            $table->foreignId('faculty_id')->constrained('tbl_faculty');
            $table->tinyInteger('status')->default(1);
            $table->string('major_name_ar');
            $table->string('major_ministry_code');
            $table->integer('major_mode');
            $table->timestamps();
            $table->softDeletes();

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_major');
    }
};
