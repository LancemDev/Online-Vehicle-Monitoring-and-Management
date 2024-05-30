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
        Schema::create('board_alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id'); // Add this line
            $table->unsignedBigInteger('vehicle_id'); // Add this line
            $table->enum('status', ['full', 'empty']);
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers'); 
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_alerts');
    }
};