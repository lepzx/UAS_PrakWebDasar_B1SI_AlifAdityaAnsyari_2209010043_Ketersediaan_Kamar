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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('status_id');
            $table->date('check_in');
            $table->date('check_out')->nullable();
            $table->timestamps();
    
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
