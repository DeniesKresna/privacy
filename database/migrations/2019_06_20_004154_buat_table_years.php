<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year_name',50);
            $table->string('year_isActive',5);
            $table->integer('year_created_by')->unsigned();
            $table->integer('year_updated_by')->unsigned();
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
        Schema::dropIfExists('years');
    }
}
