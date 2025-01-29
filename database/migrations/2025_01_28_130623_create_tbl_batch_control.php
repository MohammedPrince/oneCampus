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
        Schema::create('tbl_batch_control', function (Blueprint $table) {
            $table->id('batch_control_id');
            $table->foreignId('branch_id')->constrained('tbl_branch');
            $table->foreignId('faculty_id')->constrained('tbl_faculty');
            $table->foreignId('major_id')->constrained('tbl_major');
            $table->string('batch',20);
            $table->integer('active_sem');
            $table->integer('max_sem');
            $table->tinyInteger('graduate_status')->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_batch_control');
    }
};
