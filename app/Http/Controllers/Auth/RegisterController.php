<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
        if (isset($data['site'])) {
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
                'phone' => ['required', 'string', 'max:15'],
                'address' => ['required', 'string'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'min:8', 'same:password']
            ]);
        } else {
            return Validator::make($data, [
                'firstname' => ['required', 'string', 'max:50'],
                'lastname' => ['required', 'string', 'max:50'],
                'gender' => ['required', 'string', 'max:50'],
                'birthday' => ['required', 'string', 'max:20'],
                'phone' => ['required', 'string', 'max:15'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if (isset($data['site'])) {
            return Customer::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'phone'      => $data['phone'],
                'address'    => $data['address'],
                'password'   => Hash::make($data['password']),
                'status'     => 1
            ]);
        } else {
            return User::create([
                'firstname' => $data['firstname'],
                'lastname'  => $data['lastname'],
                'gender'    => $data['gender'],
                'birthday'  => $data['birthday'],
                'phone'     => $data['phone'],
                'email'     => $data['email'],
                'password'  => Hash::make($data['password']),
            ]);
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function showSiteRegisterForm() {
        return view('site.pages.register');
    }
}
