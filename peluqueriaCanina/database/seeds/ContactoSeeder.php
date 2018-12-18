<?php

use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nosotros')->insert([
            
            'numero' => '912345678',
            'direccion' => 'Brasil 2950, Valparaíso, Región de Valparaíso',
            'facebook' => 'PeluqueriaCanina',
            'instagram' => 'PeluqueriaCanina',
 
        ]);
    }
}
