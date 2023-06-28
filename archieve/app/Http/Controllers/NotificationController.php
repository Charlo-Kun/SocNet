<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Friendship;
class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('user')
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    public function accept(Request $request)
    {
        $notification = Notification::findOrFail($request->notification_id);
        $notification->status = 'accepted';
        $notification->save();

        // Add logic for accepting friend request

        return redirect()->route('notifications.index')->with('success', 'Friend request accepted.');
    }

    public function reject(Request $request)
    {
        $notification = Notification::findOrFail($request->notification_id);
        $notification->status = 'rejected';
        $notification->save();

        // Add logic for rejecting friend request

        return redirect()->route('notifications.index')->with('success', 'Friend request rejected.');
    }
}
