<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        $sexo=['masculino','femenino','otros'];
        foreach (range(1,10) as $elemento) {
        DB::table('users')->insert([
            'name' => $faker->firstName(),
            'email' => $faker->email,
            'password'=>bcrypt('abc123456'),
            'nickname'=>$faker->userName,
            'rut'=>$faker->unique()->randomNumber($nb=9),
            'telefono'=>$faker->unique()->randomNumber($nb=9),
            'ciudad'=>$faker->city,
            'direccion'=>$faker->address,
            'edad'=>$faker->randomNumber($nb=2),
            'sexo'=>$faker->randomElement($sexo),
        ]);}

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('abc123456'),
            'type' =>'admin',
            'nickname'=>'administrador',
            'rut'=>'12345678-9',
            'telefono'=> 123854383,
            'ciudad'=> "Valparaiso",
            'direccion'=>'calle prat 1234',
            'edad'=>80,
            'sexo'=>"masculino"

        ]);
    }
}
