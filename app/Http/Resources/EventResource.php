<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TicketInfoResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>(string)$this->id,
            'eventName'=>$this->event_name,
            'location'=>$this->location,
            'location_map'=>$this->location_map,
            'age_limit'=>$this->age_limit,
            'event_date'=>$this->event_date,
            'terms_and_conditions'=>$this->terms_and_conditions,
            'nid'=>$this->nid,
            'upcoming_event'=>$this->upcoming_event,
            'event_on_hold'=>$this->event_on_hold,
            'banner'=>$this->banner,
            'performers'=>json_decode($this->performers)
        ];
    }
}
