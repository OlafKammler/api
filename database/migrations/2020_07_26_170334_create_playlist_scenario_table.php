<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistScenarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_scenario', function (Blueprint $table) {
            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('scenario_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('list_position');
            $table->primary(['playlist_id', 'scenario_id', 'project_id']);

            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('scenario_id')->references('id')->on('scenarios');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_scenario');
    }
}
