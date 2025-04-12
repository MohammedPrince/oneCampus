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

            $table->foreignId('branch_id');//2016
            $table->foreignId('faculty_id'); //computer science
            $table->foreignId('major_id');//sci
            $table->string('batch', 20);//16
            $table->integer('active_semester');//6
            $table->integer('max_semester');//10
            $table->enum('graduate_status', ['1', '2'])->default('1'); // 1 = not graduated, 2 = graduated
            // $table->tinyInteger('graduate_status')->default(1);

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
