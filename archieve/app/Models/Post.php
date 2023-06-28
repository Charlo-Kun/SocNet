<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'id',
        'account_id',
        'content',
        'post_picture',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
    public function likes()
{
    return $this->hasMany(Like::class);
}
public function isLikedByUser($userId)
{
    return $this->likes->contains('account_id', $userId);
}

}

