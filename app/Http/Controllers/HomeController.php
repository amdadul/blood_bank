<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Donor;
use App\Histories;
use App\Lookup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $bloodGroup = Donor::where('user_id','=',$userId)->first();
        $history = Histories::where('user_id','=',$userId)
                    ->where('activity_id','=',Lookup::DONATE)
                    ->orderBy('created_at','DESC')
                    ->first();
        $from = $history->created_at;
        $today = date('Y-m-d');
        $diff = strtotime($from) - strtotime($today);
        $days = ceil(abs($diff / 86400)+1);

        $groupName = Lookup::getName('blood_group',$bloodGroup->blood_group_id);

        $bloodRequests = BloodRequest::with('user')
            ->where('blood_requests.blood_group_id','=',$bloodGroup->blood_group_id)
            ->join('donors as d', 'd.user_id', '=', 'blood_requests.user_id')
            ->orderBy('d.donation_count', 'desc')->get();
        $requestCount = count($bloodRequests);
        return view('users.dashboard',compact('bloodRequests','requestCount','days','groupName'));

    }
}
