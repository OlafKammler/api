<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectComponentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $this->createBasicFields($table);
        });
        Schema::create('scenarios', function (Blueprint $table) {
            $this->createBasicFields($table);
            $this->createModelRelationships($table);
        });
        Schema::create('checkpoints', function (Blueprint $table) {
            $this->createBasicFields($table);
        });
        Schema::create('forms', function (Blueprint $table) {
            $this->createBasicFields($table);
            $table->enum('type', ['activity', 'question']);
        });
        Schema::create('playlist_scenario', function (Blueprint $table) {
            $this->createComponentPivot($table, 'playlist', 'scenario');
        });
        Schema::create('checkpoint_scenario', function (Blueprint $table) {
            $this->createComponentPivot($table, 'checkpoint', 'scenario');
        });
        Schema::create('checkpoint_form', function (Blueprint $table) {
            $this->createComponentPivot($table, 'checkpoint', 'form');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists');
        Schema::dropIfExists('scenarios');
        Schema::dropIfExists('checkpoints');
        Schema::dropIfExists('forms');
        Schema::dropIfExists('playlist_scenario');
        Schema::dropIfExists('checkpoint_scenario');
        Schema::dropIfExists('checkpoint_form');
    }

    private function createBasicFields($table)
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('project_id')->nullable();
        $table->string('name');
        $table->text('description')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
    }

    private function createModelRelationships($table)
    {
        $table->unsignedBigInteger('context_model_id')->nullable();
        $table->unsignedBigInteger('architecture_model_id')->nullable();
        $table->unsignedBigInteger('scenery_model_id')->nullable();

        $table->foreign('context_model_id')->references('id')->on('model_contexts')->onDelete('cascade');
        $table->foreign('architecture_model_id')->references('id')->on('model_architectures')->onDelete('cascade');
        $table->foreign('scenery_model_id')->references('id')->on('model_sceneries')->onDelete('cascade');
    }

    private function createComponentPivot($table, $componentA, $componentB)
    {
        $table->unsignedBigInteger("{$componentA}_id");
        $table->unsignedBigInteger("{$componentB}_id");
        $table->unsignedBigInteger('project_id');
        $table->unsignedBigInteger('list_position');
        $table->primary(['project_id', "{$componentA}_id", "{$componentB}_id"]);

        $table->foreign("{$componentA}_id")->references('id')->on("{$componentA}s");
        $table->foreign("{$componentB}_id")->references('id')->on("{$componentB}s");
        $table->foreign('project_id')->references('id')->on('projects');
    }
}
