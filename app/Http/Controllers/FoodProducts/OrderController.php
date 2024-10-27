<?php

namespace App\Http\Controllers\FoodProducts;

use App\Http\Controllers\Controller;
use App\Models\FoodProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = FoodProductOrder::where('has_been_paid', false)
            ->whereHas('foodProduct', function ($query) {
                return $query->where('is_finalized', false);
            })
            ->paginate(10);

        return view('pages.food-products.orders.index', compact('orders'));
    }

    public function show(mixed $id)
    {
        $order = FoodProductOrder::where('id', $id)->first();

        if ($order == null) {
            abort(404);
        }

        if ($order->has_been_paid == true && $order->has_been_delivered == true) {
            abort(404);
        }

        $deliveries = User::whereHas('roles', function ($query) {
            return $query->where('name', 'repartidor de ordenes de alimentos');
        })->get();

        return view('pages.food-products.orders.show', compact('order', 'deliveries'));
    }

    public function assignDelivery(mixed $id, Request $request)
    {
        $order = FoodProductOrder::where('id', $id)->first();

        if ($order == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            if ($order->has_been_paid == true || $order->has_been_delivered == true) {
                return back();
            }

            $delivery = $request->input('delivery');
            $order->delivery_id = $delivery;
            $order->save();

            return back()
                ->with(['assign_delivery_success' => 'Se realizó la operación con éxito']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['assign_delivery' => 'Se produjo en error en la operación']);
        }
    }

    public function markAsPaid(mixed $id)
    {
        $order = FoodProductOrder::where('id', $id)->first();

        if ($order == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            if ($order->has_been_delivered) {
                $order->has_been_paid = true;
                $order->saveOrFail();

                $foodProduct = $order->foodProduct;
                $foodProduct->total_real_profits = $foodProduct->total_real_profits + $order->total_order_price;
                $foodProduct->saveOrFail();

                DB::commit();
                return redirect(route('food_orders.index'))
                    ->with(['pay_success' => 'Se realizó la operación con éxito']);
            }

            return back()
                ->withErrors(['pay_error' => 'Debe entregarse antes de confirmar pago']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['pay_error' => 'Se produjo un error al realizar la operación']);
        }
    }

    public function markAsDelivered(mixed $id)
    {
        $order = FoodProductOrder::where('id', $id)->first();

        if ($order == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $order->has_been_delivered = true;
            $order->saveOrFail();

            DB::commit();
            return back()
                ->with(['delivery_success' => 'Se entregó correctamente']);
//        return redirect(route('food_orders.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['delivery_error' => 'Se produjo un error al realizar la operación']);
        }
    }

    public function markAsPaidDelivered(mixed $id)
    {
        $order = FoodProductOrder::where('id', $id)->first();

        if ($order == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $order->has_been_delivered = true;
            $order->has_been_paid = true;
            $order->saveOrFail();

            $foodProduct = $order->foodProduct;
            $foodProduct->total_real_profits = $foodProduct->total_real_profits + $order->total_order_price;
            $foodProduct->saveOrFail();

            DB::commit();
            return redirect(route('food_orders.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['paid_delivered_error' => 'Se produjó un error en la operación']);
        }
    }
}
