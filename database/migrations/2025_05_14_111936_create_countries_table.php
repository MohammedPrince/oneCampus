<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_country', function (Blueprint $table) {
            $table->bigIncrements('country_id'); // Custom primary key
            $table->string('country_name_en');
            $table->string('country_name_ar');
            $table->softDeletes(); // Adds deleted_at column
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
}
