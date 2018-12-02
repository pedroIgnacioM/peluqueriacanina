<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Auth;
use App\Mascota;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {   
        $user = \Auth::user();

        return route('home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $imagen = $data['imagen']->store('public/perfiles');
        $user=User::create([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'imagen'=>$imagen,
        ]);
        $imagenMascota = $data['imagenMascota']->store('public/mascotas'); 
            Mascota::create([
            'nombre' => $data['nombre'],
            'raza' => $data['raza'],
            'edad' => $data['edadMascota'],
            'sexo' => $data['sexoMascota'],
            'color' => $data['color'],
            'user_id' =>$user->id,
            'imagenMascota'=>$imagenMascota,

        ]);

        
        

        return($user);
    }
    protected function registraMascota(array $data)
    {
        $user=Auth::user();

        Mascota::create([
            'nombre' => $data['nombre'],
            'raza' => $data['raza'],
            'edad' => $data['edadMascota'],
            'sexo' => $data['sexoMascota'],
            'color' => $data['color'],
            'user_id' =>$user->id,

        ]);
        return $user;
        
        }
}
