<?php
namespace App\Services\SpecialEvent;

use App\Models\SpecialEvent;
use App\Models\TransportationOption;

class PricesCalculator
{

    private static function calculateTotalCostWithTransportation(SpecialEvent $event)
    {
        $eventCost = TransportationOption::where('id', $event->transportation_option_selected)->first()->cost;

        return round(($event->fixed_fee * $event->tickets_limit) + $eventCost, 2);
    }

    private static function calculateTotalCostWithoutTransportation(float $fixedFee, int $totalTickets)
    {
        return round($fixedFee * $totalTickets, 2);
    }

    public static function calcultateTicketCost(SpecialEvent $event)
    {
        $ticketPrice = round(self::calculateTotalCost($event) / $event->tickets_limit, 2);

        return $ticketPrice;
    }

    public static function calculateTotalCost(SpecialEvent $event)
    {

        if ($event->transportation_option_selected != 0) {
            return self::calculateTotalCostWithTransportation($event);
        }

        return self::calculateTotalCostWithoutTransportation($event->fixed_fee, $event->tickets_limit);
    }
}
