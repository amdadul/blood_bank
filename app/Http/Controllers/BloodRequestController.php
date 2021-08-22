<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\BloodRequestAccept;
use App\District;
use App\Donor;
use App\Histories;
use App\Lookup;
use Illuminate\Http\Request;
use App\Mail\MailSender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BloodRequestController extends Controller
{
    public function bloodRequest()
    {
        $blood_groups = Lookup::loadItems('blood_group');
        $relationships = Lookup::loadItems('relation');
        $districts = District::all();
        return view('users.blood_request',compact('blood_groups','relationships','districts'));
    }

    public function bloodRequestView($id)
    {
        $userId = auth()->user()->id;
        $history = Histories::where('user_id','=',$userId)
            ->where('activity_id','=',Lookup::DONATE)
            ->orderBy('created_at','DESC')
            ->first();
        if($history) {
            $from = $history->created_at;
            $today = date('Y-m-d');
            $diff = strtotime($from) - strtotime($today);
            $days = ceil(abs($diff / 86400) + 1);
        }else{
            $days = 0;
        }

        $bloodRequest = BloodRequest::find($id);
        return view('users.blood_request_view',compact('bloodRequest','days'));
    }



    public function send($mailInfo,$mailTo)
    {
        $objDemo = new \stdClass();
        $objDemo->blood_group = $mailInfo->blood_group;
        $objDemo->hospital = $mailInfo->hospital;
        $objDemo->date = $mailInfo->date;
        $objDemo->mobile_no = $mailInfo->mobile_no;
        $objDemo->url = $mailInfo->url;
        $objDemo->sender = $mailInfo->sender;
        $objDemo->receiver = $mailInfo->receiver;

        Mail::to($mailTo)->send(new MailSender($objDemo));
        if( count(Mail::failures()) > 0 ) {
            echo "There was one or more failures. They were: <br />";
            foreach(Mail::failures() as $email_address) {
                echo " - $email_address <br />";
            }

        } else {

        }
    }

    public function bloodRequestStore(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'hospital_name' => 'required',
            'mobile' => 'required',
            'blood_group' => 'required',
            'union' => 'required',
        ]);

        $em = $request->emergency==1?1:0;
        $user_id = auth()->user()->id;

        $bloodRequest = new BloodRequest();
        $bloodRequest->user_id = $user_id;
        $bloodRequest->details = $request->details?$request->details:'';
        $bloodRequest->union_id = $request->union;
        $bloodRequest->hospital_name = $request->hospital_name;
        $bloodRequest->relations_id = $request->relation?$request->relation:0;
        $bloodRequest->mobile_no = $request->mobile;
        $bloodRequest->alt_mobile_no = $request->alt_mobile_no?$request->alt_mobile_no:'';
        $bloodRequest->donation_date = $request->date;
        $bloodRequest->time_frame = $request->time;
        $bloodRequest->blood_group_id = $request->blood_group;
        $bloodRequest->emergency = $em;

        if($bloodRequest->save())
        {
            $donors = Donor::where('union_id','=',$request->union)->where('blood_group_id','=',$request->blood_group)->get();
            $bloodGroup = Lookup::getName('blood_group',$bloodRequest->blood_group_id);

            $history = new Histories();
            $history->request_id = $bloodRequest->id;
            $history->user_id = auth()->user()->id;
            $history->activity_id = Lookup::REQUEST;
            $history->status = 1;
            $history->save();

            $mailInfo = new \stdClass();
            $mailInfo->blood_group = $bloodGroup;
            $mailInfo->hospital = $bloodRequest->hospital_name;
            $mailInfo->date = $bloodRequest->donation_date;
            $mailInfo->mobile_no = $bloodRequest->mobile_no;
            $mailInfo->url = $bloodRequest->id;
            $mailInfo->sender = auth()->user()->name;

            foreach($donors as $donor)
            {
                $mailTo = $donor->user->email;
                $mailInfo->receiver = $donor->user->name ;

                $this->send($mailInfo,$mailTo);
            }

            Donor::where('user_id','=',$user_id)->first()->increment('request_count');

            session()->flash('success','Blood request posted successfully');

        }
        else
        {
            session()->flash('error','Error Occurred');
        }
        return redirect()->back();
    }
}
