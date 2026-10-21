<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->string('chart_title');
            $table->foreignId('chart_type_id')->constrained();
            $table->foreignId('chart_category_id')->constrained();
            $table->text('sql_query');
            $table->boolean('isActive');
            $table->unsignedInteger('module_id');
            $table->string('filterColumn');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('charts');
    }
}
