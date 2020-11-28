<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/AllUsers';

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'UserLastName' => ['string', 'max:255'],
            'UserMobile' => ['required', 'string', 'max:255'],
            'UserDesignationId' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'UserLastName' => $data['UserLastName'],
            'UserMobile' => $data['UserMobile'],
            'UserDesignationId' => $data['UserDesignationId'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
