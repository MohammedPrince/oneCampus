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
        Schema::create('tbl_faculty', function (Blueprint $table) {
            $table->id('faculty_id');
            $table->string('faculty_name_en', 100); // Computer Science
            $table->string('faculty_name_ar',100 ); // علوم الحاسوب
            $table->string('abbreviation', 10); // CS
            $table->foreignId('branch_id'); // Khartoum
            $table->tinyInteger('is_active')->default(1); // 1 for active, 0 for inactive
            $table->timestamps();
            $table->softDeletes();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_faculty');
    }
};
