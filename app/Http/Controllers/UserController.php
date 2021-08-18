<?php

namespace App\Http\Controllers;

use App\Lookup;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        return view('users.login');
    }

    public function loginAttempt(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => 'user'
        ];

        if (auth()->guard('user')->attempt($credentials)) {
            $user =  auth()->guard('user')->user();
            return redirect()->route('user.dashboard');
        } else {
            return response()->json([
                "success" => false,
                "message" => "Email and password not match",
                "error" => 'Email and password not match',
            ], 401);
        }

    }

    public function register()
    {
        $genders = Lookup::loadItems('gender');
        $religions = Lookup::loadItems('religion');
        $blood_groups = Lookup::loadItems('blood_group');
        return view('users.register',compact('genders','religions','blood_groups'));
    }

    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
