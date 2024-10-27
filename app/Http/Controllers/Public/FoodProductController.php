<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodProducts\MakeOrderRequest;
use App\Models\FoodProduct;
use App\Models\FoodProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodProductController extends Controller
{
    private const PRODUCTS_PER_PAGE = 10;

    public function index()
    {
        $foodProducts = FoodProduct::where('is_published', true)
            ->where('is_finalized', false)
            ->paginate(self::PRODUCTS_PER_PAGE);

        return view('public.food-products.index', compact('foodProducts'));
    }

    public function show(mixed $id)
    {
        $foodProduct = FoodProduct::where('id', $id)->first();

        if ($foodProduct == null) {
            abort(404) ;
        }

        if ($foodProduct->is_published == false) {
            abort(404);
        }

        if ($foodProduct->is_finalized == true) {
            abort(404);
        }

        return view('public.food-products.show', compact('foodProduct'));
    }

    public  function  makeOrder( mixed $id, MakeOrderRequest $request)
    {
        $foodProduct = FoodProduct::where('id', $id)->first();

        if ($foodProduct == null) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $foodProductOrder = new FoodProductOrder();
            $foodProductOrder->total_order_price = $request->input('total_to_pay');
            $foodProductOrder->total = $request->input('total_units');

            $foodProductOrder->has_been_delivered = false;
            $foodProductOrder->has_been_paid = false;
            $foodProductOrder->user_id = Auth::user()->id;

            $foodProductOrder->unit_price = $foodProduct->price_per_unit;
            $foodProduct->stock -= $foodProductOrder->total;


            $foodProduct->save();
            $foodProductOrder->save();

            DB::commit();
            return back()
                ->with(['creation_success' => 'Se realizó la orden correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    public function myFoodProducts()
    {
        return view('public.food-products.my_food_products');
    }

    public function myFoodProductDetail(FoodProductOrder $order) {
        if ($order->user_id != Auth::id()) {
            abort(404);
        }

        if ($order->foodProduct->is_finalized == true) {
            abort(404);
        }

        return view('public.food-products.my_food_products_detail', compact('order'));
    }
}
