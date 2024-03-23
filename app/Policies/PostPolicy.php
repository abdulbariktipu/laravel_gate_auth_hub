<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    use HandlesAuthorization;

    public function viewList(User $user)
    {
        // Check if the user is authenticated (any authenticated user can view the list)
        return $user->is_authenticated; // You should replace 'is_authenticated' with the actual authentication check
    }

    public function view(User $user, Post $post)
    {
        // Logic to determine if the user can view the post.
        // For example, allow if the post is published or if the user is the author.
        return $post->is_published || $user->id === $post->user_id;
    }

    public function create(User $user)
    {
        // Logic to determine if the user can create a post.
        // For example, allow if the user is authenticated (any authenticated user can create).
        return $user->is_authenticated;
    }

    public function update(User $user, Post $post)
    {
        // Logic to determine if the user can update the post.
        // For example, allow if the user is the author of the post.
        return $user->id === $post->user_id || $user->isAdmin() || $user->role=='Editor';
    }

    public function delete(User $user, Post $post)
    {
        // Logic to determine if the user can delete the post.
        // For example, allow if the user is the author of the post or has admin privileges.
        return $user->id === $post->user_id || $user->isAdmin();
    }
}
