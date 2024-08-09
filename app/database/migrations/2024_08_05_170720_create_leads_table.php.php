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
        Schema::create('leads', function (Blueprint $table) {

            $table->id();
            $table->string('phone');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('status');
            $table->dateTime('call_date')->nullable();
            $table->text('call_result')->nullable();
            $table->dateTime('next_call_date')->nullable();
            $table->integer('request_id')->nullable();
            $table->foreign('request_id')->references('id')->on('requests');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};


