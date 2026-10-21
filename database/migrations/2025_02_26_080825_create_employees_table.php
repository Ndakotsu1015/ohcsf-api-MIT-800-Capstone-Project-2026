<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('passport_file')->nullable();
            $table->enum('title', ["Mr", "Mrs", "Miss"]);
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('gender', ["Male", "Female"]);
            $table->enum('marital_status', ["Single", "Married", "Divorced", "Widowed"]);
            $table->text('residential_address');
            $table->text('permanent_address');
            $table->string('phone_number');
            $table->string('nationality');
            $table->string('nin')->unique();
            $table->foreignId('lga_id')->constrained();
            $table->string('email_address')->unique();
            $table->string('ippis_no')->unique();
            $table->string('employee_no')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
