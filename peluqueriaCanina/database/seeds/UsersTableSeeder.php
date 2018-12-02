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
            'nombres' => $faker->firstName(),
            'apellidos' =>$faker->lastName,
            'correo' => $faker->email,
            'password'=>bcrypt('abc123456'),
            'telefono'=>$faker->unique()->randomNumber($nb=9),
        ]);}

        DB::table('users')->insert([
            'nombres' => 'admin',
            'apellidos' =>'admin admin',
            'telefono'=> 123854383,
            'correo' => 'admin@gmail.com',
            'password' => bcrypt('abc123456'),
            'tipo' =>'admin',

        ]);
    }
}
