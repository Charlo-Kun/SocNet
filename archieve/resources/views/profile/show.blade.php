<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,400;0,600;1,400;1,600&amp;display=swap'>
    </head>
<title>{{ $user->FirstName }}'s - Archieve</title>
<body>
    
   
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<image src="{{ asset('css/2.png') }}" style="height: 70px; width: 200px;"></image>
     <div class="left">
           
        </div>
        <div class="right">
            <input type="checkbox" id="check">
            <label for="check" class="checkBtn">
                <i class="fa fa-bars"></i>
            </label>
            <ul class="list">
          
<li><form action="{{ route('search') }}" method="GET" class="search-form">
    <input type="text" name="query" placeholder="Search account names">
    <button type="submit" class="search-button">Search</button>

</form></li>  
                <li><b><a href="{{ route('world') }}">World Archieve</a></b></li>
                <li><b><a href="{{ route('home') }}">Home</a></b></li>
                <li><b><a href="{{ route('profile') }}">Profile</a></b></li>
                <li><b><a href="{{ route('gallery') }}">Gallery</a></b></li>
                <li><b><a href="{{ route('friendlist') }}">Friends</a></b></li>
                
               

        </ul>
    </div> 
     
        <li>
    <div class="profile">
        <div class="user">
            <h3>{{ Auth::user()->FirstName }}</h3>
            <p>@ {{ Auth::user()->email }}</p>
        </div>
        <div class="img-box">
            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="some user image">
        </div>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('profile') }}"><i class="ph-bold ph-user"></i>&nbsp;Profile</a></li>
            <li><a href="{{ route('updateProfile') }}"><i class="ph-bold ph-envelope-simple"></i>&nbsp;Update Profile</a></li>
            
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-confirm-form').submit();"><i class="ph-bold ph-sign-out"></i>&nbsp;Account Settings</a> 
            <form id="logout-confirm-form" method="POST" action="{{ route('logoutConfirm') }}">
             @csrf
            </form>
            </li>
            
            <li><a href="{{ route('notifications.index') }}"><i class="ph-bold ph-question"></i>&nbsp;Notification</a></li>
           
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ph-bold ph-sign-out"></i>&nbsp;Sign Out</a> 
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
             @csrf
            </form>
            </li>
          
            
    </nav>

    <div class="container">
        
        <div class="left">
        <h1>Welcome to {{ $user->FirstName }} {{ $user->MiddleName }} {{ $user->LastName }} {{ $user->uffix }}'s profile!</h1>
      
        </div>
   

<main>

      <div id="card3">
        <div class="profile-header">
        @if ($user->profile_picture)
          <img class="profileInfo" src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
@else
<img class="profileInfo" src="{{ asset('css/1.png') }}" alt="Profile Picture">
      @endif

        </div>
        @if ($user->id !== Auth::user()->id)
    @php
        $friendRequestSent = App\Models\Friendship::where('user_id', Auth::user()->id)
            ->where('friend_id', $user->id)
            ->where('status', 'pending')
            ->exists();
        $isFriend = App\Models\Friendship::where('user_id', Auth::user()->id)
            ->where('friend_id', $user->id)
            ->where('status', 'accepted')
            ->exists();
    @endphp
    @if ($friendRequestSent)
        <div class="friend-request-sent"><p>Friend Request Sent</p></div>
    @elseif ($isFriend)
       <div class="friends"><p>Friends</p></div>
    @else
        <form method="POST" action="{{ route('sendFriendRequest', ['id' => $user->id]) }}">
            @csrf
            <button type="submit" class="friend-request-button">Send Friend Request</button>
        </form>
    @endif
@endif




        <div class="profile-text">
          <h1>  {{ $user->FirstName }} {{ $user->MiddleName }} {{ $user->LastName }} {{ $user->suffix }}</h1>
          <h2>@ {{ $user->email }}</h2> 
          <h4><strong> ●BIO</strong></h4>
        <h3>    
           {{$user->bio}}
            @csrf
        </h3>
        <h4>
          <strong> {{ $user->nationality }} </strong>  {{ $user->gender }}  <strong> {{ $user->civil_status }} </strong> Joined since ●
          {{ $user->created_at }}
        </h4>
      </div>
      
</main>





<div class="posts-section">
    <h1>Posts:</h1>
    @if ($user->posts->count() > 0)
    <table class="posts-table">
        <tbody>
            @foreach($user->posts()->latest()->get() as $post)
            <div class="post">
    <div class="post__user">
      <strong class="post__username">{{ $user->FirstName }} {{ $user->MiddleName }} {{ $user->LastName }} {{ $user->suffix }}</strong>
      <br>
      <span class="post__date">{{ $post->created_at }}</span>
     
    </div>
    <div class="post__body">
    {{ $post->content }} <br> <br>
    @if ($post->post_picture)

 <img class="post_picture" src="{{ asset('storage/' . $post->post_picture) }}" alt="post Picture">
@else
@endif 
<br>
{{ $post->likes->count() }}
@if($post->isLikedByUser(Auth::user()->id))
                        
                        <form method="POST" action="{{ route('other.unlike', $post->id, ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="undoheart"></button>
                            </form>
                            
                        @else
                            <form method="POST" action="{{ route('other.like', $post->id, ['id' => $user->id]) }}">
                                @csrf
                                <button type="submit" class="heart"></button>
                            </form>
                        @endif

    </div>
  </div>
</div>
            @endforeach
            <p>No more posts found.</p>
        </tbody>
    </table>
    @else
    <p>No posts found.</p>
    @endif
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="{{ asset('js/script.js') }}"></script>
    


</body>

</html>
