<?php

use Illuminate\Database\Seeder;

class Corte_PelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $tamannos=["pequeño","mediano","grande"];
        $tipos=["solo corte",'baño y corte','solo baño'];
        //$tiposCabellos=["grande","mediano","pequeño",'rubio',"castaño","pelo_liso"];
        foreach (range(1,10) as $i) {
            DB::table('corte_pelos')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'tipo'=>$faker->randomElement($tipos),
                //'tipoCabello'=>$faker->randomElements($tiposCabellos),
                'tamaño'=>$faker->randomElement($tamannos),
                'descripcion'=>$faker->text,
                'mascota_id'=>$faker->numberBetween($min = 1, $max = 10),
                'imagen'=>'default.png'
            ]);   
        }
    }
}
