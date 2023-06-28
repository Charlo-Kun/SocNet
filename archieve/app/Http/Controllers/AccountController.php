<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Session;
class AccountController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/profile');
        } else {
            return redirect('/login')->withErrors(['error' => 'Invalid email or password']);
        }
    }

public function confirmLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        Session::put('/confirm', true);

        return redirect('/updateAccount');
        
    } else {
        return redirect('/confirm')->withErrors(['error' => 'Invalid email or password']);
    }
}
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
{
    $credentials = $request->validate([
        'FirstName' => 'required',
        'MiddleName' => 'required',
        'LastName' => 'required',
        'suffix' => 'nullable',
        'gender' => 'required',
        'address' => 'required',
        'birthdate' => 'required',
        'email' => 'required|email|unique:accounts',
        'password' => 'required|min:8',
    ]);

    $account = Account::create([
        'FirstName' => $credentials['FirstName'],
        'MiddleName' => $credentials['MiddleName'],
        'LastName' => $credentials['LastName'],
        'suffix' => $credentials['suffix'] ?? null,
        'email' => $credentials['email'],
        'gender' => $credentials['gender'],
        'address' => $credentials['address'],
        'birthdate' => $credentials['birthdate'],
        'nationality' => $credentials['nationality'] ?? null,
        'civil_status' => $credentials['civil_status'] ?? null,
        'bio' => $credentials['bio'] ?? null,
        'password' => bcrypt($credentials['password']),
    ]);

    Auth::login($account);

    return redirect('/profile')->with('success', 'Signup successful!');
}


    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
    public function logoutConfirm()
    {
        Auth::logout();

        return redirect('/confirm');
    }
}
