<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'regex:/^[a-zA-Z ]*$/', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'phone' => ['required','regex:/^98[0-9]{8}$/','unique:users'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],

        ],
        [
            'name.required' => 'Name cannot not be empty',
            'name.regex' => 'Name can be alpabets only ',
            'address.required' => 'Address should be specified',
            'phone.required' => 'Phone number cannot be empty',
            'phone.regex' => 'Invalid phone number',
            'email.unique' => 'Email is already taken',
            'email.required' => 'Email cannot not be empty',
            'password.required' => 'Password cannot not be empty',
            // 'password.confirmed' => 'Password  did not match'


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
        $user = User::all();
        $request = request();
        if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move('images/', $image_name);
        $request->request->save(['images' => $image_name]);

    }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'images' => $data['image'],
        ]);


    }
}
