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
