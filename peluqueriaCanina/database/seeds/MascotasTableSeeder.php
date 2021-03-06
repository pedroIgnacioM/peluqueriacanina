<?php

use Illuminate\Database\Seeder;

class MascotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $razas=["Border Collie", "Poodle o Caniche" ,"Pastor Alemán" ,"Golden Retriever", "Doberman" ];
        $sexo=['macho','hembra'];
        $x=1;
        foreach (range(1,40) as $i) {
            DB::table('mascotas')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'nombre'=>$faker->firstName,
                'raza'=>$faker->randomElement($razas),
                'edad'=>$faker->numberBetween($min = 1, $max = 30),
                'color'=>$faker->colorName,
                'sexo'=>$faker->randomElement($sexo),
                'user_id'=>$x,
            ]); 
            if($x==11)
                $x=1;
            else {
                $x++;
            }

        }   
    }
}
