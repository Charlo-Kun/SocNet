<?php
namespace App\Policies;

use App\Models\Account;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\PostPolicy;

class PostPolicy
{
    use HandlesAuthorization;
    public function delete(Account $account, Post $post)
    {
        return $account->id === $post->account_id;
    }
}
