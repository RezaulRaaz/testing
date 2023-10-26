<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketInfoResource extends JsonResource
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
            'event_id'=>$this->event_id,
            'ticketName'=>$this->ticketName,
            'ticketPrefix'=>$this->ticketPrefix,
            'ticketPrice'=>$this->ticketPrice,
            'ticketStock'=>$this->ticketStock,
            'ticketFacilities'=>$this->ticketFacilities,
            'ticketImage'=>$this->ticketImage
        ];
    }
}
