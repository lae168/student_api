<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('student_id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('student_type');
            $table->string('card_number')->unique();
            $table->string('student_image')->nullable();
            $table->foreign('student_type')->references('student_type')->on('student_types')->onDelete('cascade');
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
