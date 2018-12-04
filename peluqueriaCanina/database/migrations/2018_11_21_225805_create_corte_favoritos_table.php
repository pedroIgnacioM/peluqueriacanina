<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorteFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_favoritos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

        });

        Schema::table('corte_favoritos', function (Blueprint $table) {
            $table->unsignedInteger('corte_pelos_id');
            $table->foreign('corte_pelos_id')
            ->references('id')
            ->on('corte_pelos')
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
        Schema::dropIfExists('corte_favoritos');
    }
}
