<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FriendController;
//login logout route
Route::get('/login', [AccountController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AccountController::class, 'login']);
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
Route::post('/logout/confirm', [AccountController::class, 'logoutConfirm'])->name('logoutConfirm');

Route::post('/confirmLogin', [AccountController::class, 'confirmLogin'])->name('confirmLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});

//sign up route
Route::get('/signup', [AccountController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AccountController::class, 'signup']);

//profile route
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
//profile update
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/updateProfile', [ProfileController::class, 'showUpdate'])->name('updateProfile');
Route::get('/confirm', [ProfileController::class, 'showConfirm'])->name('confirm');
Route::get('/updateAccount', [ProfileController::class, 'updateAccount'])->name('updateAccount');

//profile update route
Route::post('/profile', [ProfileController::class, 'ProfilePicture'])->name('profile');

//showing other people route
Route::get('/profile/{id}', [OtherProfileController::class, 'show'])->name('otherProfile');
Route::post('/profile/{post}/like', [OtherProfileController::class, 'like'])->name('other.like');
Route::delete('/profile/{post}/unlike', [OtherProfileController::class, 'unlike'])->name('other.unlike');

//gallery route
Route::get('/gallery', [GalleryController::class, 'show'])->name('gallery');

//posting route
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//delete post
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//home route
Route::get('/home', [HomeController::class, 'show'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/world', [HomeController::class, 'showall'])->name('world');

//liking route
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

//friend system route
Route::get('/notifications', [FriendController::class, 'index'])->name('notifications.index');
Route::post('/notifications/accept', [FriendController::class, 'acceptReject'])->name('friendship.acceptReject');
Route::post('/notifications/reject', [FriendController::class, 'rejectFriendRequest'])->name('friend.reject');
Route::post('/friends/send-request/{id}', [FriendController::class, 'sendRequest'])->name('sendFriendRequest');
Route::delete('/friend/{friendship}', [FriendController::class, 'unfriend'])->name('friend.unfriend');
Route::get('/friendlist', [FriendController::class, 'list'])->name('friendlist');
