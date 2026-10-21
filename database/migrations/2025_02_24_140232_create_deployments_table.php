<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('deployments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('designation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('division_id')->constrained()->cascadeOnDelete();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('agency_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('ministry_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cadre_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('grade_level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->timestamp('expected_assumption_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('assumption_date')->nullable();
            $table->json('qualification')->nullable();
            $table->json('certification')->nullable();
            // Redeployment fields
            $table->boolean('is_redeployed')->default(false);
            $table->enum('request_type', ["General", "Special", "Compassionate"])->default("General");
            $table->text('reason')->nullable();
            $table->string('request_letter_file')->nullable();
            $table->enum('status', ["Approved", "Pending", "Rejected"])->default("Pending"); // Default is Pending
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deployments');
    }
};
