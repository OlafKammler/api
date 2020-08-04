<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextModelsTable extends Migration
{
    private function createModelFields($table)
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('project_id')->nullable();
        $table->string('url');
        $table->string('name');
        $table->text('description');
        $table->timestamps();

        $table->foreign('project_id')->references('id')->on('projects');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_context', function (Blueprint $table) {
            $this->createModelFields($table);
        });
        Schema::create('models_architecture', function (Blueprint $table) {
            $this->createModelFields($table);
        });
        Schema::create('models_scenery', function (Blueprint $table) {
            $this->createModelFields($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_context');
        Schema::dropIfExists('models_architecture');
        Schema::dropIfExists('models_scenery');
    }
}
