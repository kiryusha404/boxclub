<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255', 'regex:/^[а-яА-ЯёЁ\-]+$/iu'],
            'surname' => ['required', 'string', 'max:255', 'regex:/^[а-яА-ЯёЁ\-]+$/iu'],
            'patronymic' => ['required', 'string', 'max:255', 'regex:/^[а-яА-ЯёЁ\-]+$/iu'],
            'tel' => ['required', 'string', 'min:11', 'max:12', 'unique:users', 'regex:/^[0-9\+]+$/i'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'remember' => ['required'],
        ], [
            'name.regex' => "Неправильный формат имени",
            'name.max' => "Максимум можно использовать :max символов",
            'surname.regex' => 'Неправильный формат фамилии',
            'surname.max' => "Максимум можно использовать :max символов",
            'patronymic.regex' => 'Неправильный формат отчества',
            'patronymic.max' => "Максимум можно использовать :max символов",
            'tel.regex' => 'Можно использовать только цифры и "+"',
            'tel.min' => 'Минимум можно использовать :min символов',
            'tel.max' => 'Максимум можно использовать :max символов',
            'password.min' => 'Минимум можно использовать :min символов',
            'password.confirmed' => 'Пароли не совпадают',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
