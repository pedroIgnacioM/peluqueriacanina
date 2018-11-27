<?php

use Illuminate\Database\Seeder;

class Reserva_CitasTableSeeder extends Seeder
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
        foreach (range(1,40) as $i) {
            DB::table('reserva_citas')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'hora'=>$faker->time($format = 'H:i', $max = '20:00'),
                'fecha'=>$faker->dateTimeThisMonth($max="2018-12-31 20:00")->format('Y-m-d H:i'),
                'servicio'=>$faker->randomElement($servicios),
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
                'mascota_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);   
        }
    }
}
