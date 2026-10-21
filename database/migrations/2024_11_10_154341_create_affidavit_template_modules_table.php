<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('affidavit_template_modules', function (Blueprint $table) {
            $table->id();
            $table->enum('module',['Probate','Process','Affidavit','Revenue']);
            // $table->foreign('module')->references('id')->
            $table->foreignId('affidavit_template_id')->constrained();
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
        Schema::dropIfExists('affidavit_template_modules');
    }
};
