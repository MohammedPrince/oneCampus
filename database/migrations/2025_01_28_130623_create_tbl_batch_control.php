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

            $table->string('batch', 20);//2016
            $table->foreignId('branch_id');//khartoum
            $table->foreignId('faculty_id'); //computer science
            $table->foreignId('major_id');//sci
            $table->integer('max_sem');//10
            $table->integer('active_sem');//6
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
