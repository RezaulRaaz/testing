<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use Illuminate\Http\Request;
use Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EventCollection(Event::paginate());
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data=[
            "event_name"=>$request->event_name,
            "slug"=>Str::slug($request->event_name),
            "location"=>$request->location,
            "location_map"=>$request->location_map,
            "age_limit"=>$request->age_limit,
            "event_date"=>$request->event_date,
            "terms_and_conditions"=>$request->terms_and_conditions,
            "nid"=>$request->nid,
            "upcoming_event"=>$request->upcoming_event,
            "event_on_hold"=>$request->event_on_hold,
            "banner"=>$request->banner,
            "performers"=>json_encode($request->performers),
        ];
        $result = Event::create($data);
        if($result){
            $res=[
                'success'=>true,
                "data"=>$result,
                "message"=>"Ticket Infornation create successfully!"
            ];
            return response()->json($res);
        }else{
            $res=[
                'success'=>false,
                "data"=>null,
                "message"=>"Ticket Infornation did not create"
            ];
            return response()->json($res);
        };
    }

    /**
     * Display the specified resource.
     */

    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data=[
            "event_name"=>$request->event_name,
            "slug"=>Str::slug($request->event_name),
            "location"=>$request->location,
            "location_map"=>$request->location_map,
            "age_limit"=>$request->age_limit,
            "event_date"=>$request->event_date,
            "terms_and_conditions"=>$request->terms_and_conditions,
            "nid"=>$request->nid,
            "upcoming_event"=>$request->upcoming_event,
            "event_on_hold"=>$request->event_on_hold,
            "banner"=>$request->banner,
            "performers"=>json_encode($request->performers),
        ];
        $result = $event->update($data);
        if($result){
            $res=[
                'success'=>true,
                "data"=>$result,
                "message"=>"Event Infornation updated successfully!"
            ];
            return response()->json($res);
        }else{
            $res=[
                'success'=>false,
                "data"=>null,
                "message"=>"Event Infornation did not update"
            ];
            return response()->json($res);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
