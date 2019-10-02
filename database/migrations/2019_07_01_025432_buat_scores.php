<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('score_student_code');
            $table->integer('score_subject_id');
            $table->integer('score_kd');
            $table->string('score_type',15);
            $table->integer('score_year_id');
            $table->integer('score_nilai')->nullable();
            $table->integer('score_remed')->nullable();
            $table->integer('score_na')->nullable();
            $table->date('score_date');
            $table->integer('score_created_by')->unsigned();
            $table->integer('score_updated_by')->unsigned();
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
        //
        Schema::dropIfExists('scores');
    }
}
