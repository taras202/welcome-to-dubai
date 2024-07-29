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
        Schema::create('vacancy_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('vacancy_id');
            $table->integer('cv_id');
            $table->integer('status');

            $table->foreign('vacancy_id')
                ->references('id')
                ->on('vacancies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
        Schema::dropIfExists('vacancy_employees');
    }
};
