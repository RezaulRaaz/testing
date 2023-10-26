<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketInfo extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_info_id', 'id');
    }
}
