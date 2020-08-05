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

        Schema::create('form_field_activity_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_activity_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('behaviour');
            $table->timestamps();

            $table->foreign('form_activity_id')->references('id')->on('form_activities')->onDelete('cascade');
        });

        Schema::create('form_field_question_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_question_type')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('behaviour');
            $table->timestamps();

            $table->foreign('form_question_type')->references('id')->on('form_questions')->onDelete('cascade');
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
        Schema::dropIfExists('form_field_activity_types');
        Schema::dropIfExists('form_field_question_types');
    }
}
