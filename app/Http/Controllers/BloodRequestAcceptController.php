<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\BloodRequestAccept;
use App\Histories;
use App\Lookup;
use Illuminate\Http\Request;

class BloodRequestAcceptController extends Controller
{
    public function bloodRequestAccept($id)
    {
        $bloodRequest = BloodRequest::find($id);
        if($bloodRequest->managed==0)
        {
            $userId = auth()->user()->id;
            $requestAccept = new BloodRequestAccept();
            $requestAccept->request_id = $id;
            $requestAccept->user_id = $userId;
            $requestAccept->status = 1;
            if ($requestAccept->save())
            {
                $history = new Histories();
                $history->request_id = $id;
                $history->user_id = $userId;
                $history->activity_id = Lookup::ACCEPT;
                $history->status = 1;
                $history->save();

                if(BloodRequestAccept::Managed($id))
                {
                    $bloodRequest->increment('managed');
                }
                session()->flash('success','Blood request accepted successfully');
            }
            else {
                session()->flash('error', 'error occurred');
            }
        }
        else
        {
            session()->flash('error', 'Blood Already Managed');
        }

        return redirect()->back();
    }
}
