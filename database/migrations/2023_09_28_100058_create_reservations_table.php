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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('user_id');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('chambres');
            $table->integer('num_of_guests');
            $table->date('arrival');
            $table->date('departure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
