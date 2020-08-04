<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_id')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });

        Schema::create('activity_form_field_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('activity_form_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('behaviour');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });

        Schema::create('question_form_field_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_form_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('behaviour');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_fields');
    }
}
