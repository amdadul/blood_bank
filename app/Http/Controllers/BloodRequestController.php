<?php

namespace App\Http\Controllers;

use App\District;
use App\Lookup;
use Illuminate\Http\Request;
use App\Mail\MailSender;
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

    }
}
