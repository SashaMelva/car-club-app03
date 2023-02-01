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
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('patronymic', 80)->nullable();
            $table->char('phone', 20);
            $table->timestamps();
        });

        Schema::create('statusOrder', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->timestamps();
        });
       
        
       Schema::create('orderTicket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idWorkShift')->unsigned();
            $table->foreign('idWorkShift')->references('id')->on('workShift');
            $table->unsignedBigInteger('idClient')->unsigned();
            $table->foreign('idClient')->references('id')->on('client');
            $table->unsignedBigInteger('idStatusOrder')->unsigned();
            $table->foreign('idStatusOrder')->references('id')->on('statusOrder');
            $table->timestamps();
        });

        Schema::create('orderPoint', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idOrderTicket')->unsigned();
            $table->foreign('idOrderTicket')->references('id')->on('orderTicket');
            $table->unsignedBigInteger('idWork')->unsigned();
            $table->foreign('idWork')->references('id')->on('work');
            $table->double('price', 20, 2);
            $table->integer('count');
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
