<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\CategoryType;
use App\Models\ModelHasImages;
use App\Models\Post;
use App\Services\Common\UploadImageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use AuthorizesRequests;

    private const POSTS_PER_PAGE = 10;

    public function index()
    {
        $userId = Auth::user()->id;

        $posts = (request()->has('buscar'))
            ?
            Post::where('user_id', $userId)
                ->where('title', 'like', '%' . request('buscar') . '%')
                ->paginate(self::POSTS_PER_PAGE)
            :
                Post::where('user_id', $userId)->paginate(self::POSTS_PER_PAGE);
            ;

        return view('pages.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = CategoryType::where('description', 'publicaciones')->first()->categories;

        return view('pages.posts.create', compact('categories'));
    }

    public function store(CreatePostRequest $request)
    {
        DB::beginTransaction();

        try {
            $post = new Post();
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->content = $request->input('content');
            $post->is_published = (bool)$request->input('is_published');
            $post->is_active = true;

            $post->user_id = Auth::user()->id;
            $post->category_id = $request->input('category');
            $post->save();

            if ($request->has('images')) {

                foreach ($request->file('images') as $file) {
                    $filename = time() . $file->getClientOriginalName();
                    $filePath = 'images/posts/';

                    $result = UploadImageService::upload($filename, $filePath, $file);

                    if ($result == true) {
                        $image = new ModelHasImages();
                        $image->url = "{$filePath}{$filename}";

                        $post->images()->save($image);
                    }
                }

            }

            DB::commit();

            return back()
                ->with(['creation_success' => 'Publicación creada correctamente']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return back()
                ->withErrors(['creation_error' => 'Se produjo un error al crear la publicación']);
        }

    }

    public function edit(mixed $id)
    {
        $post = Post::where('id', $id)->first();

        $this->authorize('view', $post);

        $categories = CategoryType::where('description', 'publicaciones')->first()->categories;

        if ($categories == null) {
            abort(404);
        }

        if ($post == null) {
            abort(404);
        }

        return view('pages.posts.edit', compact('post', 'categories'));
    }

    public function update(mixed $id, UpdatePostRequest $request)
    {
        $post = Post::where('id', $id)->first();

        $this->authorize('update', $post);

        if ($post == null) {
            abort(404);
        }

        // title
        $title = $request->input('title');

        if (Post::where('title', $title)->first() != null && $post->title != $title) {
            return back()
                ->withErrors(['title' => 'Title has already been taken.']);
        }

        DB::beginTransaction();

        try {
            $post->update([
                'title' => $title,
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'category_id' => $request->input('category'),
                'is_published' => $request->input('is_published'),
            ]);

            if ($request->has('images')) {

                if ($post?->images != null) {

                    foreach ($post->images as $image) {
                        $result = UploadImageService::delete($image->url);
                    }

                    $post->images()->delete();
                }

                foreach ($request->file('images') as $image) {
                    $filename = time() . $image->getClientOriginalName();
                    $filePath = 'images/posts/';

                    UploadImageService::upload($filename, $filePath, $image);

                    $newImage = new ModelHasImages();
                    $newImage->url = "{$filePath}{$filename}";
                    $post->images()->save($newImage);
                }
            }

            DB::commit();
            return back()
                ->with(['update_success' => 'Se actualizó correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()
                ->withErrors(['update_error' => 'Se produjo un error al actualizar']);
        }
    }
}
