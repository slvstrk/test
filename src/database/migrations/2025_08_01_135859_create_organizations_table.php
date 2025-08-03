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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('inn');
            $table->string('unit')->nullable();
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade');

            $table->timestamps();

            $table->index('name');
        });

        Schema::create('activity_organization', function (Blueprint $table) {
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade');

            $table->unique(['activity_id', 'organization_id']);
            $table->index(['activity_id', 'organization_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_organization');
        Schema::dropIfExists('organizations');
    }
};
