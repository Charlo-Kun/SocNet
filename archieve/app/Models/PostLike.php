<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    // ...

   protected $primaryKey = 'like_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'account_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}

