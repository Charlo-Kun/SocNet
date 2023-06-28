<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
     public function show()
{
    if (!auth()->check()) {
        return redirect('/login');
    }
    $user = auth()->user();
    $posts = Post::all(); // Fetch all posts from the database

    
    return view('home', compact('user', 'posts'));
}
public function showall()
{
    if (!auth()->check()) {
        return redirect('/login');
    }
    $user = auth()->user();
    $posts = Post::all(); // Fetch all posts from the database

    
    return view('world', compact('user', 'posts'));
}
public function search(Request $request)
{
    $query = $request->input('query');

    // Perform the search query on the User model
    $results = Account::where('FirstName', 'LIKE', "%$query%")
                    ->orWhere('MiddleName', 'LIKE', "%$query%")
                    ->orWhere('LastName', 'LIKE', "%$query%")
                    ->orWhere('suffix', 'LIKE', "%$query%")
                    ->get();

    return view('search_results', compact('results'));
}


}
