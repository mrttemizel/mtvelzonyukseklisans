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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bolum_id');
            $table->foreign('bolum_id')->references('id')->on('bolumlers');
            $table->text('name')->nullable();
            $table->text('country_number')->nullable();
            $table->text('country')->nullable();
            $table->text('place_of_birth')->nullable();
            $table->text('date_of_birth')->nullable();
            $table->text('gender')->nullable();
            $table->text('military_service_certificate')->nullable();
            $table->text('military_service')->nullable();
            $table->text('identity')->nullable();
            $table->text('city')->nullable();
            $table->text('town')->nullable();
            $table->text('phone_nummber')->nullable();
            $table->text('email')->nullable();
            $table->longText('address')->nullable();
            $table->text('university')->nullable();
            $table->text('faculty')->nullable();
            $table->text('section')->nullable();
            $table->bigInteger('graduation_score')->nullable();
            $table->text('starting_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('certificate')->nullable();
            $table->text('transcript')->nullable();
            $table->float('ales')->nullable();
            $table->float('yds')->nullable();
            $table->text('ales_certificate')->nullable();
            $table->text('yds_certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
