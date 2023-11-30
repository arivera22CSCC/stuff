<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tweet;
class PostPolicy
{
    public function update(User $user, Tweet $tweet)
    {
    return $user->id === $tweet->user_id;
    }
    public function destroy(User $user, Tweet $tweet)
    {
        return $user->id === $tweet->user_id;
    }
    public function edit(User $user, Tweet $tweet)
    {
        return $user->id === $tweet->user_id;
    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
