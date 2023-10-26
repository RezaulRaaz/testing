<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function ticketInfos()
    {
        return $this->hasMany(TicketInfo::class, 'event_id', 'id');
    }
}
