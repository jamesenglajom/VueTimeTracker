<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\TrackerRecord;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\apiResource;

class TrackerRecordController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
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
        $saved;
        if(!isset($data['id'])){
            $tracker = new TrackerRecord;
            $user = User::find($data['user_id']);
            if(isset($data['time_in'])){
                $tracker->time_in = $data['time_in'];
            }
            $saved = $user->time_tracker()->save($tracker);
            return new apiResource($saved);

        }else{
            if(isset($data['time_out'])){
                $tracker = TrackerRecord::find($data['id']);
                $saved = $tracker->update(['time_out'=> $data['time_out']]);
                return new apiResource(TrackerRecord::find($tracker->id));
            }
        }
    }


    public function user(Request $request)
    {   
        $id="";
        if(isset($request['id'])){
            $id = $request['id'];
            $user = User::with(['time_tracker' => function($q){
                $q->orderBy('created_at','desc');
            }])->where('id',$id)->get();
            return apiResource::collection($user);
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