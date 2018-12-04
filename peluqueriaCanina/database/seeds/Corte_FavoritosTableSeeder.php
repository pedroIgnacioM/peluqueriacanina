<?php

use Illuminate\Database\Seeder;

class Corte_FavoritosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        foreach (range(1,5) as $i) {
            DB::table('corte_favoritos')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'corte_pelos_id'=>$faker->numberBetween($min = 1, $max = 10),
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);   
        }
    }
}
