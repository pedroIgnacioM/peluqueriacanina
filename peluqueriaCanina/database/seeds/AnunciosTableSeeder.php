<?php

use Illuminate\Database\Seeder;

class AnunciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $estados = ['activado','desactivado'];
        foreach (range(1,5) as $i) {
            DB::table('anuncios')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'fecha'=>$faker->dateTimeThisYear,
                'descripcion'=>$faker->text,
                'direccion'=>$faker->address,
                'estado'=>$faker->randomElement($estados),
                'titulo'=>$faker->domainWord,
                'imagen'=>'public/eventos/'.'evento_default.png',
                'user_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);   
        }
    }
}
