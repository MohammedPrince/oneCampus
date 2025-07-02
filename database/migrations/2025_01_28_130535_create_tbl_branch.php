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
        Schema::create('tbl_branch', function (Blueprint $table) {
            $table->id('branch_id');
            $table->string('branch_name', 100);
            $table->string('branch_address', 255);
            $table->string('branch_country', 100);
            $table->string('branch_city', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_branch');
    }
};
