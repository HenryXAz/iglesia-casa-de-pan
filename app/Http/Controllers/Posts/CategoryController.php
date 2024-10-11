<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private const CATEGORIES_PER_PAGE = 5;

    private function validations (array $data) {
        return Validator::make($data, [
            'description' => 'required|string',
        ]);
    }

    public function index()
    {
        $type = CategoryType::where('description', 'publicaciones')->first();
        $categories = Category::where('category_type_id', $type->id)->paginate(self::CATEGORIES_PER_PAGE);

        return view('pages.posts.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.posts.categories.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validations($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors());
        }

        $type = CategoryType::where('description', 'publicaciones')->first();

        if ($type == null) {
            abort(500);
        }

        $category = new Category();
        $category->description = $request->input('description');
        $category->category_type_id = $type->id;
        $result = $category->save();

        if ($result == false) {
            return back()
                ->withErrors(['creation_error' => 'Se produjo un error al crear la categoría']);
        }

        return redirect(route('posts.categories.edit', $category->id))
            ->with(['creation_success' => 'Se creó la categoría exitosamente']);
    }

    public function edit(mixed $id)
    {
        $category = Category::where('id', $id)->first();

        if ($category == null) {
            abort(404);
        }

        if ($category->type->description != 'publicaciones') {
            abort(404);
        }

        return view('pages.posts.categories.edit', compact('category'));
    }

    public function update(mixed $id, Request $request)
    {
        $validator = $this->validations($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors());
        }

        $category = Category::where('id', $id)->first();

        if ($category == null) {
            abort(404);
        }

        if ($category->type->description != 'publicaciones') {
            abort(404);
        }

        $category->description = $request->input('description');
        $result = $category->save();

        if ($result == false) {
            return back()
                ->withErrors(['update_error' => 'Algo falló al actualizar categoría']);
        }

        return back()
            ->with(['update_success' => 'Se actualizó correctamente']);
    }

}
