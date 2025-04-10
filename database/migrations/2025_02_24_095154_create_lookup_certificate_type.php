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
        Schema::create('lookup_certificate_type', function (Blueprint $table) {
            $table->id('certificate_type_id');
            $table->string('certificate_type_name', 25);
            $table->string('certificate_type_name_ar', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lookup_certificate_type');
    }
};
