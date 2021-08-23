<?php

namespace App\Http\Controllers;

use App\BloodRequestAccept;
use App\Histories;
use App\Lookup;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $donations = Histories::where('user_id','=',$userId)->where('activity_id','=',Lookup::DONATE)->get();
        $takes = Histories::where('user_id','=',$userId)->where('activity_id','=',Lookup::REQUEST)->get();

        return view('users.history',compact('donations','takes'));

    }

    public function donated($id)
    {
        $requestAccepted = BloodRequestAccept::find($id);

        $history = new Histories();
        $history->request_id = $requestAccepted->request_id;
        $history->user_id = $requestAccepted->user_id;
        $history->activity_id = Lookup::DONATE;
        $history->status = 1;

        if($history->save())
        {
            $requestAccepted->decrement('status');
            session()->flash('success','Blood donation posted successfully');
        }
        else
        {
            session()->flash('error','Error Occurred');
        }
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function show(Histories $histories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function edit(Histories $histories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histories $histories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Histories  $histories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histories $histories)
    {
        //
    }
}
