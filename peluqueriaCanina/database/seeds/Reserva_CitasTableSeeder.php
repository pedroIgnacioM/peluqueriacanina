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
        $horasDomingo = ["09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00"];
        $horasNormales = ["09:00","10:00","11:00","12:00","13:00"];
        foreach (range(1,40) as $i) {
            $fecha=$faker->dateTimeBetween($startDate = 'now', $endDate = '+5 weeks')->format('Y-m-d');
            
            $diaDeLaSemana = date("w",strtotime($fecha));
            if($diaDeLaSemana==0)
            {
                $hora= $faker->randomElement($horasNormales);
            }else {
                $hora= $faker->randomElement($horasDomingo);
            }
            DB::table('reserva_citas')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'fecha'=>$fecha." ".$hora,
                'servicio'=>$faker->randomElement($servicios),
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
                'mascota_id'=>$faker->numberBetween($min = 1, $max = 40),
            ]);   
        }
    }
}
