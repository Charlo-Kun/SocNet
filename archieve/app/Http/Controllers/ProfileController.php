<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function show()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $user = auth()->user();
        $posts = Post::where('account_id', $user->id)->latest()->get();
    
        return view('profile', compact('user', 'posts'));
        return view('updateProfile', compact('user', 'posts'));
    }
    public function showConfirm()
    {
      
        
        return view('confirm');
    }
    public function showUpdate()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $user = auth()->user();
        $posts = Post::where('account_id', $user->id)->latest()->get();
    
        
        return view('updateProfile', compact('user', 'posts'));
    }

  public function updateAccount()
{
    // Check if the flag indicating login page visit exists in the session
    if (!Session::has('/confirm')) {
        return redirect('/confirm');
    }

    // Clear the flag from the session
    Session::forget('/confirm');

    // Remaining code...
    $user = Auth::user();
    $posts = Post::where('account_id', $user->id)->latest()->get();

    return view('updateAccount', compact('user', 'posts'));
}

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Update other profile fields if the input is not null
        $user->FirstName = $request->input('FirstName') ?? $user->FirstName;
        $user->MiddleName = $request->input('MiddleName') ?? $user->MiddleName;
        $user->LastName = $request->input('LastName') ?? $user->LastName;
        $user->suffix = $request->input('suffix') ?? $user->suffix;
        $user->birthdate = $request->input('birthdate') ?? $user->birthdate;
        $user->bio = $request->input('bio') ?? $user->bio;
        $user->address = $request->input('address') ?? $user->address;
        $user->nationality = $request->input('nationality') ?? $user->nationality;
        $user->civil_status = $request->input('civil_status') ?? $user->civil_status;

      // Update email if the input is not null and different from the current email
    $newEmail = $request->input('email');
    if ($newEmail && $newEmail !== $user->email) {
        $user->email = $newEmail;
    }

    // Update password if the input is not null
    $newPassword = $request->input('password');
    if ($newPassword) {
        $user->password = bcrypt($newPassword);
      
    }

        // ...

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
    public function ProfilePicture(Request $request)
    {
        $user = Auth::user();

    
        // Handle profile picture upload
        if($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $filename = $user->id . '.' . $profilePicture->getClientOriginalExtension();
            $path = $profilePicture->storeAs('profile_pictures', $filename, 'public');
            $user->profile_picture = $path;
        }
                

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
  

}
