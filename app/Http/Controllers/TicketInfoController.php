<?php

namespace App\Http\Controllers;

use App\Models\TicketInfo;
use App\Http\Requests\StoreTicketInfoRequest;
use App\Http\Requests\UpdateTicketInfoRequest;
use App\Http\Resources\TicketInfoResource;
use App\Http\Resources\TicketInfoCollection;
use Illuminate\Http\Request;
use  App\Helpers\Helpers;

class TicketInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TicketInfoCollection(TicketInfo::paginate());
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
    public function store(StoreTicketInfoRequest $request)
    {
        $fileNameWithPath = "";
        if ($request->ticketImage) {
            $image = $request->ticketImage;
            $fileNameWithPath = Helpers::fileUpload($image, 'ticketInfo');
        }

        $data=[
            "ticketName"=>$request->ticketName,
            "ticketPrefix"=>$request->ticketPrefix,
            "ticketPrice"=>$request->ticketPrice,
            "ticketStock"=>$request->ticketStock,
            "ticketFacilities"=>$request->ticketFacilities,
            "ticketImage"=>$fileNameWithPath,
            "event_id"=>$request->event_id,
        ];

        $result =TicketInfo::create($data);
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
    public function show(TicketInfo $ticketInfo)
    {
        return new TicketInfoResource($ticketInfo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketInfo $ticketInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketInfoRequest $request, TicketInfo $ticketInfo)
    {
        $fileNameWithPath = "";
        if ($request->ticketImage) {
            $exitingImagePath=$ticketInfo->ticketImage;
            $image = $request->ticketImage;
            $fileNameWithPath = Helpers::fileUpload($image, 'ticketInfo',$exitingImagePath);
        }else{
            $fileNameWithPath = $ticketInfo->ticketImage;
        }

        $data=[
            "ticketName"=>$request->ticketName,
            "ticketPrefix"=>$request->ticketPrefix,
            "ticketPrice"=>$request->ticketPrice,
            "ticketStock"=>$request->ticketStock,
            "ticketFacilities"=>$request->ticketFacilities,
            "ticketImage"=>$fileNameWithPath,
            "event_id"=>$request->event_id,
        ];

        $result =$ticketInfo->update($data);
        if($result){
            $res=[
                'success'=>true,
                "data"=>$result,
                "message"=>"Ticket Infornation updated successfully!"
            ];
            return response()->json($res);
        }else{
            $res=[
                'success'=>false,
                "data"=>null,
                "message"=>"Ticket Infornation did not update"
            ];
            return response()->json($res);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketInfo $ticketInfo)
    {
        //
    }
}
