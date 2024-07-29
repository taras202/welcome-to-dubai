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
        Schema::create('cv', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('avatar')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('date_of_birth');
            $table->string('position');
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->text('about')->nullable();
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->boolean('is_top')->nullable();
            $table->boolean('is_hot')->nullable();
            $table->string('currency')->nullable();
            $table->integer('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv');
    }
};
