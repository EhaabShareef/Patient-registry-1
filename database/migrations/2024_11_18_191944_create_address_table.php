<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('island_id');
            $table->string('city')->nullable();
            $table->string('house_name');
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();



            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
