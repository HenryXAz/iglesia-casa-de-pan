<?php

namespace App\Http\Controllers\FoodProducts;

use App\Http\Controllers\Controller;
use App\Models\FoodProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('pages.food-products.deliveries.index');
    }

    public function show(FoodProductOrder $order)
    {
//        if ($order->has_been_delivered == true) {
//            abort(404);
//        }

        if ($order->foodProduct->is_finalized == true) {
            abort(404);
        }

        if ($order->delivery_id != Auth::user()->id) {
            abort(404);
        }

        return view('pages.food-products.deliveries.show', compact('order'));
    }
}
