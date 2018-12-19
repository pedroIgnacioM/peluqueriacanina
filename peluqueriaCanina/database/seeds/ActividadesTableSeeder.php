<?php

use Illuminate\Database\Seeder;

class ActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        foreach (range(1,10) as $i) {
            DB::table('actividades')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);  
        }
    }
}
