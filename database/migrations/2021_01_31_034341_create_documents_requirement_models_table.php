<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsRequirementModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_requirement_model', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('requirement_model_id')->references('id')->on('requirement_models')->onDelete('cascade');
            $table->foreignId('documents_id')->references('id')->on('documents')->onDelete('cascade');
            $table->boolean('backwards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_requirement_model');
    }
}
