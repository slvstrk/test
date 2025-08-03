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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('type'); // AddressTypeEnum
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('unit')->nullable();

            $table->decimal('lat', 10, 8);
            $table->decimal('lon', 11, 8);

            $table->timestamps();

            $table->index(['lat', 'lon']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
