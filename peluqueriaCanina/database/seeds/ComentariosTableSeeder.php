<?php

use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
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
            DB::table('comentarios')->insert([
                'id'=>$i,
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'descripcion'=>$faker->text
            ]);   
        }   
    }
}
