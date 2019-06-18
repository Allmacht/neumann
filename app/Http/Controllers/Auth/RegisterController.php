<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => ['required','unique:users','string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'names' => ['required','string','max:60'],
            'paternal_surname' => ['required','string','max:60'],
            'maternal_surname' => ['required','string','max:60'],
            'enrollment' => ['nullable','unique:users','max:100'],
        ],[
            'name.required' => 'El nombre de usuario es requerido',
            'name.unique' => 'El nombre de usuario ya está en uso',
            'name.max' => 'El nombre de usuario debe ser menor a 20 caracteres',

            'email.required' => 'El email es requerido',
            'email.email' => 'El email ingresado no es válido',
            'email.max' => 'La longitud del email debe ser menor a 255 caracteres',
            'email.unique' => 'El email ingresado ya está en uso',

            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La longitud de la contraseña debe ser mínimo de 8 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            
            'names.required' => 'El nombre personal es requerido',
            'names.max' => 'La longitud del nombre personal debe ser menor a 60 caracteres',
            
            'paternal_surname.required' => 'El apellido paterno es requerido',
            'paternal_surname.max' => 'La longuitud del apellido paterno debe ser menor a 60 caracteres',

            'maternal_surname.required' => 'El apellido materno es requerido',
            'maternal_surname.max' => 'La longuitud del apellido materno debe ser menor a 60 caracteres',

            'enrollment.unique' => 'El número de matrícula ya está en uso',
            'enrollment.max' => 'La longuitud de la matrícula debe ser menor a 100 caracteres'
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'names' => $data['names'],
            'paternal_surname' => $data['paternal_surname'],
            'maternal_surname' => $data['maternal_surname'],
            'enrollment' => $data['enrollment']
        ]);

        if(isset($data['teacher'])){
            $user->assignRole('Docente');
        }else{
            $user->assignRole('Estudiante');
            $user->authorized = true;
            $user->save();
        }

        return $user;
    }
}
