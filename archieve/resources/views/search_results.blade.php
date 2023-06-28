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

<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<image src="css/2.png" style="height: 70px; width: 200px;"></image>
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
    <!-- Home Page -->
    <div class="container">
        
        <div class="left">
        <h1>Search Results</h1>

@if ($results->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach ($results as $result)
            <div class="post">
                @if ($result->profile_picture)
                    <div class="post__user">
                        <div class="profile-header">
                            <img class="profileInfo" src="{{ asset('storage/' . $result->profile_picture) }}"
                                alt="Profile Picture">
                            <a href="{{ route('otherProfile', ['id' => $result->id]) }}">{{ $result->FirstName }}
                                {{ $result->MiddleName }} {{ $result->LastName }} {{ $result->suffix }}</a>
                        </div>
                    </div>
                @else
                    <div class="post__user">
                        <div class="profile-header">
                            <img class="profileInfo" src="css/1.png" alt="Profile Picture">
                            <a href="{{ route('otherProfile', ['id' => $result->id]) }}">{{ $result->FirstName }}
                                {{ $result->MiddleName }} {{ $result->LastName }} {{ $result->suffix }}</a>
                        </div>
                    </div>
                @endif
                @if ($result->id !== Auth::user()->id)
                    @php
                        $friendRequestSent = App\Models\Friendship::where('user_id', Auth::user()->id)
                            ->where('friend_id', $result->id)
                            ->where('status', 'pending')
                            ->exists();
                        $isFriend = App\Models\Friendship::where('user_id', Auth::user()->id)
                            ->where('friend_id', $result->id)
                            ->where('status', 'accepted')
                            ->exists();
                    @endphp
                    @if ($friendRequestSent)
                    <div class="friend-request-sent"><p >Friend Request Sent.</p></div>
                        
                    @elseif ($isFriend)
                     <div class="friends"><p>Friends</p></div>   
                    @else
                        <form method="POST" action="{{ route('sendFriendRequest', ['id' => $result->id]) }}">
                            @csrf
                            <button type="submit" class="friend-request-button">Send Friend Request</button>
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
    </ul>
@endif

               

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

