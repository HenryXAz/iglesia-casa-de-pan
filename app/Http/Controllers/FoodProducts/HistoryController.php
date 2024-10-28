<?php

namespace App\Http\Controllers\FoodProducts;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use App\Models\FoodProductOrder;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $foodProducts = (request()->has('buscar'))
            ?
            FoodProduct::where('is_finalized', true)
                ->where('title', 'like', '%' . request('buscar') . '%')
                ->paginate(10)
            :
            FoodProduct::where('is_finalized', true)
            ->where('is_published', true)
            ->paginate(10);
            ;

        return view('pages.food-products.history.index', compact('foodProducts'));
    }

    public function show(FoodProduct $foodProduct)
    {
        return view('pages.food-products.history.show', compact('foodProduct'));
    }
}
