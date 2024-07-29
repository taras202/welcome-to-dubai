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
        Schema::create('cv_languages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cv_id');
            $table->string('language');
            $table->integer('level');

            $table->foreign('cv_id')
                ->references('id')
                ->on('cv')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_languages');
    }
};
