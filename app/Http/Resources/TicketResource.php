<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'ticket_info_id'=>$this->ticket_info_id,
            'name'=>$this->name,
            'nid'=>$this->nid,
            'gender'=>$this->gender,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'date_of_birth'=>$this->date_of_birth,
            'transaction_id'=>$this->transaction_id,
            'ticket_no'=>$this->ticket_no,
            'status'=>$this->status,
        ];
    }
}
