<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\TrackerRecord;
use App\User;
use Illuminate\Http\Request;

class TrackerRecordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
        $data = $request->all();

        if(!isset($data['id'])){
            $tracker = new TrackerRecord;
        }else{
            $tracker = TrackerRecord::find($data['id']);
        }
        $user = User::find($data['user_id']);
        // $tracker->user_id = $data['user_id'];
        
        if(isset($data['time_in'])){
            $tracker->time_in = $data['time_in'];
        }
        if(isset($data['time_out'])){
            $tracker->time_out = $data['time_out'];
        }

        $saved = $user->time_tracker()->save($tracker);
        return json_encode($data);
    }


    public function user(Request $request)
    {   
        $id="";
        if(isset($data['id'])){
            $id = $request['id'];
            return json_encode(User::with('time_tracker')->get());
        }else{
            return json_encoed(['error'=>"Parameter id is needed."]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrackerRecord  $trackerRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackerRecord $trackerRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrackerRecord  $trackerRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackerRecord $trackerRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrackerRecord  $trackerRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackerRecord $trackerRecord)
    {
        //
    }
}