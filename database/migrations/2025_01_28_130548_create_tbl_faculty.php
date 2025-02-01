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
            $table->string('faculty_name', 100);
            $table->string('abbreviation', 10);
            $table->string('faulty_name_ar',100 );
            $table->foreignId('branch_id');
            $table->tinyInteger('status')->default(1);
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
