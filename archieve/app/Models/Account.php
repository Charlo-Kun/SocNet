<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName',
        'LastName',
        'MiddleName',
        'suffix',
        'email',
        'address',
        'birthdate',
        'gender',
        'password',
        'profile_picture',
        'c  ivil_status',
        'nationality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function likes()
{
    return $this->hasMany(Like::class);
}

public function updateAccount($data)
{
    $this->update([
        'FirstName' => $data['FirstName'],
        'LastName' => $data['LastName'],
        'MiddleName' => $data['MiddleName'],
        'suffix' => $data['suffix'],
        'email' => $data['email'],
        'address' => $data['address'],
        'birthdate' => $data['birthdate'],
        'gender' => $data['gender'],
        'civil_status' => $data['civil_status'],
        'nationality' => $data['nationality'],
        'bio' => $data['bio'],
    ]);

    if (!empty($data['password'])) {
        $this->update(['password' => Hash::make($data['password'])]);
    }

    if ($data['profile_picture'] !== null) {
        $profilePicture = $data['profile_picture'];
        $filename = $this->id . '.' . $profilePicture->getClientOriginalExtension();
        $path = $profilePicture->storeAs('profile_pictures', $filename, 'public');
        $this->profile_picture = $path;
        $this->save();
    }
}
//friend system
public function isFriend($accountId)
{
    return $this->friends()->where('accounts.id', $accountId)->exists();
}



public function hasFriendRequestFrom($senderId)
{
    return $this->friendships()
        ->where('sender_id', $senderId)
        ->where('status', 'pending')
        ->exists();
}

public function friendships()
{
    return $this->hasMany(Friendship::class, 'user_id');
}
public function sentFriendRequests()
{
    return $this->hasMany(Notification::class, 'user_id')
        ->where('type', 'friend_request')
        ->where('status', 'pending');
}

public function receivedFriendRequests()
{
    return $this->hasMany(Notification::class, 'friend_id')
        ->where('type', 'friend_request')
        ->where('status', 'pending');
}

public function notifications()
{
    return $this->hasMany(Notification::class);
}
public function isFriendOf($user)
{
    return $this->friends()->where('friend_id', $user->id)->exists();
}

public function friends()
{
    return $this->belongsToMany(Account::class, 'friendships', 'user_id', 'friend_id')
        ->wherePivot('status', 'accepted')
        ->withTimestamps();
        
}


}
