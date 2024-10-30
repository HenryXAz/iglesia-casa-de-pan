<?php

namespace App\Http\Controllers\FoodProducts;

use App\Http\Controllers\Controller;
use App\Mail\FoodProducts\AuthorizeFoodProductEmail;
use App\Models\Category;
use App\Models\FoodProduct;
use App\Models\ModelHasImages;
use App\Models\User;
use App\Services\Common\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FoodProductController extends Controller
{

    public function index()
    {
        return view('pages.food-products.index');
    }

    public function view(mixed $id)
    {
        $foodProduct = FoodProduct::where('id', $id)->first();

        if ($foodProduct == null) {
            abort(404);
        }

        if ($foodProduct->user_id != Auth::id()) {
            abort(404);
        }

        return view('pages.food-products.view', compact('foodProduct'));
    }

    public function create()
    {
        return view('pages.food-products.create');
    }

    public function store(Request $request)
    {
        $authorizers = User::whereHas('roles', function ($query) {
            return $query->where('name', 'administrador autorizacion venta de alimentos');
        })
//                ->where('identifier', '!=', Auth::user()->identifier)
            ->get(['identifier']);

        DB::beginTransaction();
        try {
            $foodProduct = new FoodProduct();
            $foodProduct->title = $request->input('title');
            $foodProduct->description = $request->input('description');
            $foodProduct->cost = $request->input('cost');
            $foodProduct->stock = $request->input('units');
            $foodProduct->price_per_unit = $request->input('price_per_unit');
            $foodProduct->total_profits = $request->input('total_return');
            $foodProduct->total_real_profits = 0.00;
            $foodProduct->is_active = true;
            $foodProduct->is_published = false;
            $foodProduct->is_finalized = false;

            $foodProduct->user_id = Auth::user()->id;
            $foodProduct->category_id = Category::where('description', 'general')->first()->id;

            $foodProduct->save();

            if ($request->has('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $filePath = 'images/food-products/';

                UploadImageService::upload($filename, $filePath, $file);
                $image = new ModelHasImages();
                $image->url = "{$filePath}{$filename}";
                $foodProduct->images()->save($image);
            }

            foreach ($authorizers as $authorizer) {
                Mail::to($authorizer->identifier)->queue(
                    new AuthorizeFoodProductEmail($foodProduct->id),
                );
            }

            DB::commit();
            return redirect(route('food_products.view', $foodProduct->id));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->with(['creation_error' => 'Falló la creación de actividad']);
        }
    }

    public function authorizeFoodProduct(mixed $id)
    {
        $foodProduct = FoodProduct::where('id', $id)->first();

        if ($foodProduct == null) {
            abort(404);
        }

        if ($foodProduct->is_published == true) {
            abort(419);
        }

        return view('pages.food-products.authorization', compact('foodProduct'));
    }

    public function confirmAuthorization(mixed $id)
    {
        $foodProduct = FoodProduct::where('id', $id)->first();

        if ($foodProduct == null) {
            abort(404);
        }

        if ($foodProduct->is_published == true) {
            abort(419);
        }

        $foodProduct->is_published = true;
        $foodProduct->save();

        return redirect(route('dashboard'));
    }

    public function markAsFinalized(FoodProduct $foodProduct)
    {
        if ($foodProduct->user_id != Auth::user()->id) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $foodProduct->is_finalized = true;
            $foodProduct->saveOrFail();

            DB::commit();
            return redirect(route('food_products.index'))
                ->with(['finalized_success' => 'Actividad finalizada con éxito']);
        } catch(\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['finalized_error' => 'Se produjo un error al realizar la operación']);
        }
    }
}
