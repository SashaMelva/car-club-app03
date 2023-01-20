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
       
        /*Schema::create('userr', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('patronymic', 80)->nullable();
            $table->foreign('role')->references('id')->on('role');
            $table->string('login', 80)->unique();
            $table->string('password', 80);
            $table->binary('photo')->nullable();
        });
       Schema::create('order_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreign('work_shift')->references('id')->on('work_shift');
            $table->foreign('client')->references('id')->on('client');
        });

        Schema::create('order_pointt', function (Blueprint $table) {
            $table->id();
            $table->foreign('order_ticket')->references('id')->on('order_ticket');
            $table->foreign('work')->references('id')->on('work');
            $table->foreign('user')->references('id')->on('user');
            $table->double('price', 20, 2);
            $table->integer('count');
        });*/
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
