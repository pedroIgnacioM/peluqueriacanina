<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nosotrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nosotros')->insert([
            
            'titulo1' => '¿Como inicio el negocio?',
            'descripcion1' => 'Brillante resplandor hay aquí cuando vas corriendo por la ciudad para descansar después de un gran día de práctica y no sé por que razón, no lo sé yo siento esta atracción por ti nuestras miradas se cruzaron sin control. No te irás nunca ya, te amaré loco estoy por tu amor, gritaré el mundo sabrá que viviré loco por ti... Romper esta barrera sin dudarlo me separa de tu amor, que todos sepan que me gustas mañana el sol brillará. A todos demostremos que no hay nada que pudiera separarnos de sólo pienso en ti, lo gritare y por ti estoy loco de amor... ',

            'titulo2' => 'Sobre mi',
            'descripcion2' => 'Fuego ardiente dentro de mi Mil miradas en el horizonte La indecicion huyo Llegare a la meta Se cumplira lo se El futuro un triunfo me depara Nada se interpondra La devilidad se esfumo Ardiendo esta La llama en mi La victoria te pertenece ya El poder del fuego habras De tener con invencible corazon Tuyo sera En tus ojos hay
            Ese gran poder Es la meta con su gran luz La frontera logre alcanzar Mas alla tu iras Con el corazon Ellos volaran Hacia el horizonte veran Los conocimientos estan En cualqueir lugar',
            'imagen'=>'public/nosotros/nosotros.jpg'
        ]);
    }
}
