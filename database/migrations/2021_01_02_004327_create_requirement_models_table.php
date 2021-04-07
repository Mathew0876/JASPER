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
            $table->foreignId('assigned_to')->nullable();
            $table->string('ciaaa_category');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('mitigations')->nullable();
            $table->string('priority');
            $table->string('state')->default('Open');
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
