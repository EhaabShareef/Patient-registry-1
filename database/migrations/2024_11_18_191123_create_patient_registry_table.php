<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('national_id');
            $table->string('address_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_registry');
    }
};
