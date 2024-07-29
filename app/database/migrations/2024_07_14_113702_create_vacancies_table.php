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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->string('currency')->nullable();
            $table->integer('salary_type')->nullable();
            $table->integer('working_type')->nullable();
            $table->integer('employment_type')->nullable();
            $table->integer('exp_years')->nullable();
            $table->integer('education_level')->nullable();
            $table->string('working_conditions')->nullable();
            $table->boolean('is_top')->nullable();
            $table->boolean('is_hot')->nullable();
            $table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->integer('company_id');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
