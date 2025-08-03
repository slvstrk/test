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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('phoneable_id');
            $table->string('phoneable_type');

            $table->unsignedBigInteger('number');
            $table->unsignedInteger('ext')->nullable();

            $table->timestamps();

            $table->index(['phoneable_id', 'phoneable_type']);
            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
