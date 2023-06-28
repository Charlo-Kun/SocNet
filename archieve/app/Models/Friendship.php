<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    
    protected $table = 'Friendships';

    protected $fillable = [
        
        'user_id',
        'friend_id',
        'sender_id',
        'receiver_id',
        'status',
    ];

  public function user()
{
    return $this->belongsTo(Account::class, 'user_id');
}

public function friend()
{
    return $this->belongsTo(Account::class, 'friend_id');
}


}
