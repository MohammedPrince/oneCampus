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
        Schema::create('tbl_intake', function (Blueprint $table) {
            $table->id('intake_id');
            // $table->string('intake_name_ar')->charset('utf8mb4')->collation('utf8mb4_unicode_ci'); // this store arabic only

            $table->string('intake_name_en', 25);
            $table->string('intake_name_ar', 25);
          
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_intake');
    }
};
