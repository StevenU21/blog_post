<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\RedirectResponse;

class PostPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('No tienes permisos para realizar esta acción, mamala😈😎.');
    }

    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('No tienes permisos para realizar esta acción, mamala😈😎.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar un post que no es tuyo, mamala😈.');
    }
}
