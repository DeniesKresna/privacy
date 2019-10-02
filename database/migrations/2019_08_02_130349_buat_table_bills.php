<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_subject_id');
            $table->smallInteger('bill_level_id');
            $table->smallInteger('bill_kd');
            $table->integer('bill_created_by')->unsigned();
            $table->integer('bill_updated_by')->unsigned();
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
        Schema::dropIfExists('bills');
    }
}
