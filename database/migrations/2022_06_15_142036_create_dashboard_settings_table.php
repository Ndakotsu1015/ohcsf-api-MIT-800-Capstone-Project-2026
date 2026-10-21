<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('dashboard_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_id')->constrained();
            $table->foreignId('module_id')->constrained();
            $table->foreignId('chart_type_id')->constrained();
            $table->foreignId('chart_category_id')->constrained();
            $table->string('chart_title');
            $table->boolean('is_active')->default(false);
            $table->unsignedInteger('orderby');
            $table->boolean('is_group')->default(false);
            $table->foreignId('sub_module_id')->constrained('submodules');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_settings');
    }
}
