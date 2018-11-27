<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenToCortePelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corte_pelos', function (Blueprint $table) {
             $table->string('imagen')->after('tipoCabello');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corte_pelos', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
}
