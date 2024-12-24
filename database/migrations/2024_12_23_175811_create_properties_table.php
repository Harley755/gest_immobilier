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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('address');
            $table->string('city');

            $table->integer('postal_code');
            $table->integer('surface');
            $table->integer('bedrooms'); // nbre de chambre
            $table->integer('rooms'); // nbre de pieces
            $table->integer('floor'); // étages
            $table->decimal('price', 15, 2);

            $table->boolean('is_sell');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
