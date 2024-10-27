<?php

namespace App\Http\Controllers\FoodProducts;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use App\Models\FoodProductOrder;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $foodProducts = FoodProduct::where('is_finalized', true)
            ->where('is_published', true)
            ->paginate(10);

        return view('pages.food-products.history.index', compact('foodProducts'));
    }

    public function show(FoodProduct $foodProduct)
    {
        return view('pages.food-products.history.show', compact('foodProduct'));
    }
}
