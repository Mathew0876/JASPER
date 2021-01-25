<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner');
            $table->foreignId('assigned_to');
            $table->string('CIAAA_category');
            $table->string('title');
            $table->string('description');
            $table->string('mitigations');
            $table->string('priority');
            $table->string('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_models');
    }
}
