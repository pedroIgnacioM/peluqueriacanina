<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCortePelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_pelos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('tamaño');
            $table->string('tipoCabello');
            $table->timestamps();
        });

        Schema::table('corte_pelos', function (Blueprint $table) {
            
            $table->unsignedInteger('mascota_id')->nullable();
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
        Schema::dropIfExists('corte_pelos');
    }
}
