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
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('survey_id')->references('id')->on('survey')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('num_question');
            $table->string('question', 255)->nullable();;
            $table->string('type_question', 100);
            $table->longText('possible_answers')->nullable();;
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
        Schema::dropIfExists('questions');
    }
};
