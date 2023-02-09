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
        Schema::create('statusWorkShift', function (Blueprint $table) {
            $table->id();
            $table->string('statusWorkShiftName');
            $table->timestamps();
        });

       Schema::create('workShift', function (Blueprint $table) {
            $table->id(); 
            $table->date('date');
            $table->time('startTime');
            $table->time('endTime');
            $table->unsignedBigInteger('idStatusWorkShift')->unsigned();
            $table->foreign('idStatusWorkShift')->references('id')->on('statusWorkShift');
            $table->timestamps();
        });

       

        Schema::create('workerForWorkShift', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idWorkShift')->unsigned();
            $table->foreign('idWorkShift')->references('id')->on('workShift');
            $table->unsignedBigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('userr');
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
    }
};
