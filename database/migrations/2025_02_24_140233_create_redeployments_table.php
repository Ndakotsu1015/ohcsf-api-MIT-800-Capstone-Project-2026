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
        Schema::disableForeignKeyConstraints();

        Schema::create('redeployments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('designation_id')->constrained();
            $table->enum('request_type', ["Special","Compassionate"]);
            $table->foreignId('deployment_id')->constrained();
            $table->text('benefit')->nullable();
            $table->string('request_letter_file')->nullable();
            $table->date('effective_date');
            $table->date('end_date_report')->nullable();
            $table->enum('status', ["Approved","Pending","Rejected"]);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeployments');
    }
};
