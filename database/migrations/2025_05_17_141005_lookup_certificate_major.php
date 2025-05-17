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
        Schema::create('lookup_certificate_major', function (Blueprint $table) {
            $table->id('certificate_major_id');
            $table->string('certificate_major_name', 25);
            $table->string('certificate_major_name_ar', 25);
            $table->timestamps();
            $table->softDeletes(); // optional, if you want soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('lookup_certificate_major');

    }
};
