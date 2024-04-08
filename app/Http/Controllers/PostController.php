<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

// use App\Http\Requests\BlogFilterRequest;

class PostController extends Controller
{

    public function create(): View
    {
        $post = new Post();

        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function store(CreatePostRequest $request) {

       $post = Post::create($request->validated());
       $post->tags()->sync($request->validated(['tags']));
        return redirect()->route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id
        ])->with('success', 'Article créer avec succès !');
    }

    public function index(): View {
        return view('blog.index', ['posts' => Post::with('tags', 'category')->paginate(6)]);
    }

    public function dasboard(): View {
        return view('dashboard.blog.show', ['posts' => Post::with('tags', 'category')->paginate(6)]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View | Post
    {
        if($post->slug !== $slug) {
            return to_route('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);
        }

            return view('blog.show', ['post' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);

    }

    public function update(Post $post, CreatePostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        /**
         * @var UploadedFile|null $image
         */
        $image = $request->validated('image');
        if($image !== null && !$image->getError()) {
              // Assuming that $request->file('image') is the uploaded file
              $path = $request->file('image')->storeAs('public/blog', $image->getClientOriginalName());
              $post->imagePath = $path;
              $post->save();

        }
        $post->update($request->validated());
        $post->tags()->sync($request->validated(['tags']));

        return redirect()->route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id
        ])->with('success', 'Article modifié avec succès !');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Article supprimé avec succès !');
    }
}
