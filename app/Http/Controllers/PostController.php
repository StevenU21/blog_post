<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'user', 'tags')->latest()->paginate(4);
        return view('posts.index', compact('posts'));
    }

    //mostrar los posts que tengan la misma etiqueta
    public function postsByTags(string $name)
    {
        $start_time = microtime(true);

        $tag = Tag::where('name', $name)->firstOrFail();
        $posts = $tag->posts()->with('category', 'user', 'tags')->paginate(4);
        $post_tag_count = $tag->posts()->count();

        $time_taken_ms = (microtime(true) - $start_time) * 1000;
        $formatted_time = sprintf("%.2f ms", $time_taken_ms);

        return view('posts.post_tags', compact('posts', 'tag', 'post_tag_count', 'formatted_time'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Post creado Correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('category', 'user', 'tags')->find($id);

        $comments = $post->comments()->with('user')->paginate(4);
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Actualizar el post
        $post->update($request->validated() + [
            'user_id' => auth()->id(),
        ]);

        // Actualizar etiquetas
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado Correctamente.');
    }
}
