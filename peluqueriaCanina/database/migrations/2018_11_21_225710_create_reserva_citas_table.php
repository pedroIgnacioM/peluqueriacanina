<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora');
            $table->string('fecha');
            $table->string('servicio');
            $table->timestamps();
        });
        Schema::table('reserva_citas', function (Blueprint $table) {
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedInteger('mascota_id');
            $table->foreign('mascota_id')
            ->references('id')
            ->on('mascotas')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_citas');
    }
}
