<?php
namespace App\Services\SpecialEvent;

use App\Models\SpecialEvent;
use Illuminate\Support\Facades\DB;

class TicketCalculator
{


    public static function getAvailableTickets(SpecialEvent $specialEvent)
    {
        $reservedTickets = DB::table('special_events_subscriptions')
            ->where('special_event_id', $specialEvent->id)
            ->sum('tickets');

        return $specialEvent->tickets_limit - $reservedTickets;
    }
}
