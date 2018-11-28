<?php

use Illuminate\Database\Seeder;

class Tipo_CabelloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $tiposCabellos=["grande","mediano","pequeño",'rubio',"corto rulos","castaño"];
        foreach ($tiposCabellos as $cabello) {
            
            DB::table('tipo_cabello')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'nombre'=>$cabello,
            ]);   
        }
    }
}
