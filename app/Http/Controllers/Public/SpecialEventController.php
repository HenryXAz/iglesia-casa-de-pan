<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialEvent\SubscriptionRequest;
use App\Models\SpecialEvent;
use App\Models\SpecialEventSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialEventController extends Controller
{
    private const EVENTS_PER_PAGE = 2;
    private const SUBSCRIPTIONS_PER_PAGE = 2;

    public function index()
    {
        $specialEvents = SpecialEvent::where('is_published', true)->paginate(2);

        return view('public.special-events.index', compact('specialEvents'));
    }

    public function show(mixed $id)
    {
        $specialEvent = SpecialEvent::where('id', $id)->first();

        if ($specialEvent == null) {
            abort(404);
        }

        return view('public.special-events.show', compact('specialEvent'));
    }

    public function subscribe(mixed $id, SubscriptionRequest $request)
    {
        $specialEvent = SpecialEvent::where('id', $id)->first();

        if ($specialEvent == null) {
            abort(404);
        }

        DB::beginTransaction();

        try {
            $subscription = new SpecialEventSubscription();
            $subscription->tickets = $request->input('total_tickets');
            $subscription->tickets_total_price = $request->input('total_to_pay');
            $subscription->has_been_paid = false;

            $subscription->user_id = Auth::user()->id;
            $subscription->special_event_id = $specialEvent->id;
            $subscription->save();

            DB::commit();
            return back()
                ->with(['creation_success' => 'Se hizo la orden correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['creation_error' => 'No se pudo realizar la orden']);
        }
    }

    public  function  mySubscriptions()
    {
        $userId = Auth::user()->id;
        $subscriptions = SpecialEventSubscription::where('user_id', $userId)
            ->whereHas('event', function ($query) {
                return $query->where('is_published', true);
            })
            ->paginate(self::SUBSCRIPTIONS_PER_PAGE);
        return view('public.special-events.my-subscriptions', compact('subscriptions'));
    }

    public  function  subscriptionDetail(mixed $id)
    {
        $subscription = SpecialEventSubscription::where('id', $id)->first();

        if ($subscription == null) {
            abort(404);
        }

        if ($subscription->event->is_published == false) {
            abort(404);
        }

        if ($subscription->user_id != Auth::user()->id) {
            abort(404);
        }

        return view('public.special-events.subscription-detail', compact('subscription'));
    }
}
