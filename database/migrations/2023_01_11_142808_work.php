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
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            $table->string('workName', 80);
            $table->text('description', 240)->nullable();
            $table->timestamps();
        });


        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('roleName', 20);
            $table->text('description', 240)->nullable();
            $table->timestamps();
        });


        Schema::create('userr', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('patronymic', 80)->nullable();
            $table->unsignedBigInteger('idRole')->unsigned()->nullable();
            $table->foreign('idRole')->references('id')->on('roles')->nullable();
            $table->string('login', 80)->nullable();
            $table->string('password', 80)->nullable();
            $table->binary('photo')->nullable();
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
