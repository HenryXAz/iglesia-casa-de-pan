<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
//    public function viewAny(User $user): bool
//    {
//        //
//        return true;
//    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): Response
    {
        //
        return $user->id != $post->user_id
            ?
            Response::deny('You are not authorized to view this post.')->withStatus(404)
            :
            Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
//    public function create(User $user): bool
//    {
//        //
//        return true;
//    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        return $user->id != $post->user_id
            ?
            Response::deny()->withStatus(404)
            :
            Response::allow()->withStatus(200);
    }

    /**
     * Determine whether the user can delete the model.
     */
//    public function delete(User $user, Post $post): bool
//    {
//        //
//        return true;
//    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Post $post): bool
//    {
//        //
//        return true;
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Post $post): bool
//    {
//        //
//        return true;
//    }
}
