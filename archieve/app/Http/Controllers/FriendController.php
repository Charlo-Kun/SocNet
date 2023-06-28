<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class FriendController extends Controller
{
    public function index()
{
    $friendships = Friendship::where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->with(['user' => function ($query) {
            $query->select('id', 'FirstName','MiddleName', 'LastName', 'suffix' , 'profile_picture');
        }])
        ->get();

    $friendupdates = Friendship::where('user_id', auth()->id())
        ->whereIn('status', ['accepted', 'rejected'])
        ->with(['friend' => function ($query) {
            $query->select('id', 'FirstName','MiddleName', 'LastName', 'suffix' , 'profile_picture');
        }])
        ->get();
        $friends = Friendship::where('user_id', auth()->id())
        ->where('status', 'accepted')
        ->with('friend')
        ->get();

       

    return view('notifications.index', compact('friendships', 'friends', 'friendupdates'));
}
public function list()
{
    $friendships = Friendship::where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->with(['user' => function ($query) {
            $query->select('id', 'FirstName','MiddleName', 'LastName', 'suffix');
        }])
        ->get();

    $friendupdates = Friendship::where('user_id', auth()->id())
        ->whereIn('status', ['accepted', 'rejected'])
        ->with(['friend' => function ($query) {
            $query->select('id', 'FirstName','MiddleName', 'LastName', 'suffix');
        }])
        ->get();
        $friends = Friendship::where('user_id', auth()->id())
        ->where('status', 'accepted')
        ->with('friend')
        ->get();

        

    return view('friendlist', compact('friendships', 'friends', 'friendupdates'));
}


    public function sendFriendRequest(User $user)
    {
        // Check if a friend request already exists
        if ($this->friendRequestExists($user)) {
            // Friend request already sent or pending
            return redirect()->back()->with('error', 'Friend request already sent or pending.');
        }

        // Create a new friend request
        $friendship = new Friendship();
        $friendship->user_id = Auth::id(); // Sender's user ID
        $friendship->friend_id = $user->id; // Receiver's user ID
        $friendship->status = 'pending';
        $friendship->save();

        // Optionally, you can create a notification for the receiver of the friend request

        return redirect()->back()->with('success', 'Friend request sent successfully.');
    }
    public function sendRequest(Request $request, $id)
    {
        $senderId = $request->user()->id;
        $receiverId = $id;

        $friendship = Friendship::create([
            'user_id' => $senderId,
            'friend_id' => $receiverId,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Friend request sent successfully.');
    }
    public function acceptReject(Request $request)
{
    $friendship = Friendship::find($request->input('friendship_id'));
    $status = $request->input('status');

    // Update the existing friendship status
    $friendship->status = $status;
    $friendship->save();

    // Create a new friendship record with reversed user_id and friend_id
    if ($status === 'accepted') {
        $newFriendship = new Friendship();
        $newFriendship->user_id = $friendship->friend_id;
        $newFriendship->friend_id = $friendship->user_id;
        $newFriendship->status = 'accepted';
        $newFriendship->save();
    }

    return redirect()->back()->with('success', 'Friendship status updated successfully.');
}

    public function update(Request $request)
    {
        $friendshipId = $request->input('friendship_id');
        $status = $request->input('status');
    
        $friendship = Friendship::find($friendshipId);
        if ($friendship) {
            $friendship->status = $status;
            $friendship->save();
    
            return redirect()->back()->with('success', 'Friendship status updated successfully.');
        }
    
        return redirect()->back()->with('error', 'Friendship not found.');
    }
    
    

    public function acceptFriendRequest(User $user)
    {
        $friendships = Friendship::findOrFail($user->user_id);
        $friendships->status = 'accepted';
        $friendships->save();

        // Add logic for accepting friend request

        return redirect()->route('notifications.index')->with('success', 'Friend request accepted.');
    }

    public function rejectFriendRequest(User $user)
    {
        // Check if a friend request exists
        $friendship = $this->getFriendRequest($user);

        if (!$friendship) {
            // Friend request does not exist or already rejected
            return redirect()->back()->with('error', 'Friend request not found or already rejected.');
        }

        // Update the friend request status to 'rejected'
        $friendship->status = 'rejected';
        $friendship->save();

        return redirect()->back()->with('success', 'Friend request rejected successfully.');
    }

    public function removeFriend(User $user)
    {
        // Check if the specified user is a friend
        $friendship = $this->getFriendship($user);

        if (!$friendship) {
            // Specified user is not a friend
            return redirect()->back()->with('error', 'User is not a friend.');
        }

        // Delete the friendship entry from the database
        $friendship->delete();

        return redirect()->back()->with('success', 'Friend removed successfully.');
    }

    private function friendRequestExists(User $user)
    {
        // Check if a friend request already exists between the authenticated user and the specified user
        return Friendship::where('user_id', Auth::id())
            ->where('friend_id', $user->id)
            ->where('status', 'pending')
            ->exists();
    }

    private function getFriendRequest(User $user)
    {
        // Retrieve the friend request between the authenticated user and the specified user
        return Friendship::where('user_id', $user->id)
            ->where('friend_id', Auth::id())
            ->where('status', 'pending')
            ->first();
    }

    private function getFriendship(User $user)
    {
        // Retrieve the friendship between the authenticated user and the specified user
        return Friendship::where(function ($query) use ($user) {
            $query->where('user_id', Auth::id())
                ->where('friend_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('friend_id', Auth::id());
        })->where('status', 'accepted')
        ->first();
    }
    
    public function unfriend(Friendship $friendship)
    {
        // Check if the logged-in user is the owner of the friendship
        if ($friendship->user_id === Auth::id()) {
            // Delete the friendship record
            $friendship->delete();
            return redirect()->back()->with('success', 'You have successfully unfriended.');
        }
    
        return redirect()->back()->with('error', 'Failed to unfriend.');
    }
}
