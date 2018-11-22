<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::table('reserva_productos', function (Blueprint $table) {
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')
            ->references('id')
            ->on('productos')
            ->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('reserva_productos');
    }
}
