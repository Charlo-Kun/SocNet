<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function account()
{
    return $this->belongsTo(Account::class);
}

public function post()
{
    return $this->belongsTo(Post::class);
}

}
