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
        Schema::create('redeployment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->text('reason');
            $table->string('request_letter_file');
            $table->enum('status', ["Approved", "Pending", "Rejected"])->default("Pending");
            $table->enum('request_type', ["Special", "Compassionate"]);
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeployment_requests');
    }
};
