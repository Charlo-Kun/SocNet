<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class OtherProfileController extends Controller
{
    public function show($id)
    {
        $user = Account::find($id);
        $posts = Post::all();

        if (!$user) {
            return view('profile.show',['user' => $user], compact( 'posts'));// Display a 404 page if user not found
        }

        return view('profile.show', compact('user' , 'posts'));
    }
    public function like( $id ) 
    {
        $user = Account::find($id);
        $posts = Post::find($id);
        $post = Post::all();

        $like = new Like();
        $like->post_id = $posts->id;
        $like->account_id = Auth::user()->id;
        $like->save();

        return redirect()->back();
    }

    public function unlike( $id)
    {
        $user = Account::find($id);
        $posts = Post::find($id);
        $post = Post::all();
        $like = Like::where('post_id', $posts->id)->where('account_id', Auth::user()->id)->first();
        $like->delete();

        return redirect()->back();
    }
    

}
