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
        });
        Schema::create('userr', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('patronymic', 80)->nullable();
            $table->foreign('role_id')->references('id')->on('role');
            $table->string('login', 80)->unique();
            $table->string('password', 80);
            $table->binary('photo')->nullable();
        });
       Schema::create('order_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_work_shift')->references('id')->on('work_shift');
            $table->foreign('id_client')->references('id')->on('client');
        });

        Schema::create('order_pointt', function (Blueprint $table) {
            $table->id();
            $table->foreign('order_ticket')->references('id')->on('order_ticket');
            $table->foreign('id_work')->references('id')->on('work');
            $table->foreign('id_user')->references('id')->on('user');
            $table->double('price', 20, 2);
            $table->integer('count');
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
