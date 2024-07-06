<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, string $id)
    {
        $post = Post::find($id);
        Comment::create($request->validated() + [
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Comentario creado Correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return response()->json(['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->update($request->validated());
        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comentario actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $postId = Post::find($comment->post_id);
        $comment->delete();
        return redirect()->route('posts.show', $postId)->with('success', 'Comentario eliminado Correctamente.');
    }
}
