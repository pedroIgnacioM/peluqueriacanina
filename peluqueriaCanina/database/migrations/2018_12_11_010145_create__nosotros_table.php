<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNosotrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_nosotros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo1');
            $table->string('descripcion1');
            
            $table->string('titulo2');
            $table->string('descripcion2');
            
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
        Schema::dropIfExists('_nosotros');
    }
}
