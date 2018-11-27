<?php

use Illuminate\Database\Seeder;

class Reserva_ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $servicios=["solo corte",'baño y corte','solo baño'];
        $estado=['vendido','en el carrito','cancelado'];
        foreach (range(1,40) as $i) {
            DB::table('reserva_productos')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'estado'=>$faker->randomElement($estado),
                'cantidad'=>$faker->randomDigit,
                'producto_id'=>$faker->numberBetween($min = 1, $max = 10),
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]); 
        }
    }         
}
