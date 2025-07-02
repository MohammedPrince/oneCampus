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
            $table->string('major_name_en'); //Computer Science
            $table->string(column: 'major_name_ar'); //علوم الحاسوب
            $table->string('major_abbreviation'); //CS
            $table->integer('credits_required'); //120
            $table->string('major_ministry_code'); //12345
            $table->integer('major_mode'); //02
            $table->string('degree_type'); //01
            $table->foreignId('faculty_id'); //Foreign key referencing tbl_faculty 02
            $table->integer('number_of_semesters'); //10
            $table->integer('program_duration'); //24
            $table->tinyInteger('status')->default(1); //1 = active, 0 = inactive
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
