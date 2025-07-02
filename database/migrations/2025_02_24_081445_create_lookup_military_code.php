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
        Schema::create('lookup_military_code', function (Blueprint $table) {
            $table->id('military_code_id');
            $table->string('military_code_name', 25);
            $table->string('military_code_name_ar', 25);
            $table->string('description', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lookup_military_code');
    }
};
