<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::create([
            'account_id' => Auth::user()->id,
            'content' => $request->input('content'),
        ]);

        if ($request->hasFile('post_picture')) {
            $postPicture = $request->file('post_picture');
            $filename = $post->id . '.' . $postPicture->getClientOriginalExtension();
            $path = $postPicture->storeAs('post_pictures', $filename, 'public');
            $post->post_picture = $path;
            $post->save();
        }

        return redirect()->back();
    }
    
    
    public function like(Post $post)
    {
        $like = new Like();
        $like->post_id = $post->id;
        $like->account_id = Auth::user()->id;
        $like->save();

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        $like = Like::where('post_id', $post->id)->where('account_id', Auth::user()->id)->first();
        $like->delete();

        return redirect()->back();
    }
    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    
        // Optionally, you can redirect the user to a different page after deleting the post
        return redirect('/profile');  }
    

    public function ProfilePicture(Request $request)
    {
        $user = Auth::user();

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $filename = $user->id . '.' . $profilePicture->getClientOriginalExtension();
            $path = $profilePicture->storeAs('profile_pictures', $filename, 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

}
