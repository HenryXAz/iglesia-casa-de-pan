<?php

namespace App\Http\Controllers\SpecialEvents;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialEvents\CreateSpecialEventRequest;
use App\Http\Requests\SpecialEvents\UpdateSpecialEventRequest;
use App\Models\SpecialEvent;
use App\Models\SpecialEventSubscription;
use App\Models\TransportationOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialEventController extends Controller
{
    private const EVENTS_PER_PAGE = 10;

    private function eventHasTransportationOptions(Request $request)
    {
        $hasTransportationOption = [
            'response' => false,
            'howMany' => 0,
        ];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'option_') !== false) {
                $hasTransportationOption['howMany']++;
            }
        }

        if ($hasTransportationOption['howMany'] > 0) {
            $hasTransportationOption['response'] = true;
            $hasTransportationOption['howMany'] /= 3;
        }

        return $hasTransportationOption;
    }


    public function index()
    {
        $events = SpecialEvent::paginate(self::EVENTS_PER_PAGE);

        return view('pages.special-events.index', compact('events'));
    }

    public function create()
    {
        return view('pages.special-events.create');
    }


    public function store(CreateSpecialEventRequest $request)
    {
        DB::beginTransaction();
        try {
            $specialEvent = new SpecialEvent();
            $specialEvent->name = $request->get('name');
            $specialEvent->description = $request->get('description');

            $hasFixedFee = $request->get('hasFixedFee') != null;
            $specialEvent->fixed_fee = $hasFixedFee ? $request->get('fixed_fee') : 0.00;
            $specialEvent->has_fixed_fee = $hasFixedFee;
            $specialEvent->cost = 0.00;
            $specialEvent->user_id = Auth::user()->id;

            $specialEvent->is_published = false;
            $specialEvent->is_active = true;


            if ($request->input('tickets_limit') > 0) {
                $specialEvent->has_tickets_limit = true;
                $specialEvent->tickets_limit = $request->input('tickets_limit');
            } else {
                $specialEvent->has_tickets_limit = false;
                $specialEvent->tickets_limit = 0;
            }

            $specialEvent->save();


            $hasTransportationOption = $this->eventHasTransportationOptions($request);

            if ($hasTransportationOption['response'] == true) {
                for ($index = 0; $index < $hasTransportationOption['howMany']; $index++) {
                    $option = new TransportationOption();
                    $option->description = $request->get('option_description_' . $index);
                    $option->cost = $request->get('option_cost_' . $index);
                    $option->total_tickets = $request->get('option_tickets_' . $index);
                    $option->special_event_id = $specialEvent->id;
                    $option->save();
                }

            }

            DB::commit();
            return redirect(route('special-events.edit', $specialEvent->id))
                ->with(['creation_success' => 'Se creó la actividad correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['creation_error' => 'Se produjó un error al crear la actividad']);
        }

    }

    public function edit(mixed $id, Request $request)
    {
        $specialEvent = SpecialEvent::where('id', $id)->first();

        $transportationOptions = $specialEvent->transportationOptions;

        if ($specialEvent == null) {
            abort(404);
        }

        if ($specialEvent->user_id != Auth::user()->id) {
            abort(404);
        }

        return view('pages.special-events.edit', compact('specialEvent', 'transportationOptions'));
    }

    public function update(mixed $id, UpdateSpecialEventRequest $request)
    {
        $specialEvent = SpecialEvent::where('id', $id)->first();

        if ($specialEvent == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {

            $specialEvent->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'fixed_fee' => ($request->input('fixed_fee') > 0) ? $request->get('fixed_fee') : 0.00,
                'is_published' => $request->input('is_published'),
            ]);


            $hasTransportationOption = $this->eventHasTransportationOptions($request);

            if ($hasTransportationOption['response'] == true) {
                $options = $specialEvent->transportationOptions;
                $index = 0;
                foreach ($options as $option) {
                    $option->description = $request->get('option_description_' . $index);
                    $option->cost = $request->get('option_cost_' . $index);
                    $option->total_tickets = $request->get('option_tickets_' . $index);
                    $option->special_event_id = $specialEvent->id;
                    $option->save();
                    $index++;
                }
            }

            $option = $request->input('option_selected');


            if ($option == null) {
                $specialEvent->cost = $specialEvent->fixed_fee * $specialEvent->tickets_limit;
            }

            if (($specialEvent->has_tickets_limit == false && $option != null) || $option != $specialEvent->transportation_option_selected) {

                $specialEvent->transportation_option_selected = $request->input('option_selected');

                $option = TransportationOption::where('id', $option)->first();
                $specialEvent->tickets_limit = $option->total_tickets;
                $specialEvent->has_tickets_limit = true;
                $specialEvent->cost = round($option->cost + ($specialEvent->fixed_fee * $option->tickets_limit), 2);

                $specialEvent->transportation_option_selected = $request->input('option_selected');
            }


            $specialEvent->save();
            DB::commit();
            return back()
                ->with(['update_success' => 'Se actualizó correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['update_error' => 'Se produjo un error al actualizar']);
        }

    }

    public function tracking(mixed $id)
    {
        $event = SpecialEvent::where('id', $id)->first();

        if ($event == null) {
            abort(404);
        }

        return view('pages.special-events.tracking', compact('event'));
    }

    public function  markAsPaid(mixed $id, Request $request)
    {
        $subscription = SpecialEventSubscription::where('id', $id)->first();

        if ($subscription == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $subscription->has_been_paid = true;
            $subscription->save();

            DB::commit();
            return back()
                ->with(['action_success' => 'Se realizó la cancelación correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['action_error' => 'Se produjo un error al realizar la cancelación']);
        }
    }

}
