<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function show()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $user = auth()->user();
        $posts = Post::where('account_id', $user->id)->latest()->get();
    
        return view('gallery', compact('user', 'posts'));
      
    }
 

}
