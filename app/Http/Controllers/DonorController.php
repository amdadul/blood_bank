<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Histories;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $histories = Histories::where('user_id','=',$userId)->orderBy('created_at','desc')->get();
        $donor = Donor::where('user_id','=',$userId)->first();

        return view('users.profile',compact('histories','donor'));
    }
}
