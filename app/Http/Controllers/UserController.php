<?php

namespace App\Http\Controllers;

use App\District;
use App\Donor;
use App\Lookup;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        if(auth()->guard('user')->check()) {
            return Redirect::route('user.dashboard');
        }
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

    public function logout(Request $request)
    {
        auth()->guard('user')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function register()
    {
        $genders = Lookup::loadItems('gender');
        $religions = Lookup::loadItems('religion');
        $blood_groups = Lookup::loadItems('blood_group');
        $districts = District::all();
        return view('users.register',compact('genders','religions','blood_groups','districts'));
    }

    public function registerStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'weight' => 'required',
            'union' => 'required',
        ]);

        $user = new User();
        $donor = new Donor();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->user_type = 'user';
        if($user->save())
        {
            $donor->user_id = $user->id;
            $donor->alt_mobile_no = $request->alt_mobile_no?$request->alt_mobile_no:'';
            $donor->union_id = $request->union;
            $donor->address = $request->address?$request->address:'';
            $donor->blood_group_id = $request->blood_group;
            $donor->gender_id = $request->gender;
            $donor->religion_id = $request->religion;
            $donor->weight = $request->weight;
            $donor->dob = $request->dob;
            if($donor->save())
            {
                session()->flash('success', 'Registration Completed Successfully');
                return redirect(route('login'));
            }
            else{
                session()->flash('error', 'Error Occurred');
                return redirect()->back();
            }
        }
        else
        {
            session()->flash('error', 'Error Occurred');
            return redirect()->back();
        }
    }
}
