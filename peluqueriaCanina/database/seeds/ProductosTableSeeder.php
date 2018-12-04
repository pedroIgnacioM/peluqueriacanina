<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $productos=[
            "rascador de gato", 
            "Pelota interactiva con recompensa" ,
            "raton para gato" ,"Cuerda para perro", 
            "Cuerda de tiro trenzada",
            "cola de zorro para gatos",
        ];
        $imagenes=[
            'producto_default.jpg',
            'juguete1.jpg',
            'juguete2.jpg',
            'juguete3.jpg',
            'juguete4.jpg'
        ];
        foreach (range(1,10) as $i) {
            DB::table('productos')->insert([
                'created_at'=>$faker->dateTimeThisYear,
                'updated_At'=>$faker->dateTimeThisYear,
                'nombre'=>$faker->randomElement($productos),
                'descripcion'=>$faker->text,
                'precio'=>$faker->numberBetween($min = 4000, $max = 15000),
                'imagen'=>'public/productos/'. $faker->randomElement($imagenes)
            ]);   
        }
    }
}
