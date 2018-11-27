<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductosTableSeeder::class,
            UsersTableSeeder::class,
            MascotasTableSeeder::class,
            Corte_PelosTableSeeder::class,
            Corte_FavoritosTableSeeder::class,
            Reserva_ProductosTableSeeder::class,
            Reserva_CitasTableSeeder::class,
            Tipo_CabelloTableSeeder::class
        ]);

    }
}
