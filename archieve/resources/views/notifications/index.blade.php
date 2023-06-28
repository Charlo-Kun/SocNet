
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,400;0,600;1,400;1,600&amp;display=swap'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
 
</head>

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
<h1>Notifications</h1>
    @foreach ($friendupdates as $friendupdate)
    <div class="friend-request">
    <li><span class="folder-icon"></span><h3><a href="{{ route('otherProfile', ['id' =>  $friendupdate->friend->id]) }}">{{  $friendupdate->friend->FirstName }}
                                {{  $friendupdate->friend->MiddleName }} {{  $friendupdate->friend->LastName }} {{  $friendupdate->friend->suffix }}</a>
                         @if ($friendupdate->status === 'accepted')
            and you are now friends.
        @elseif ($friendupdate->status === 'rejected')
            : Has Rejected your friend request.
        @elseif ($friendupdate->status === 'pending')
            Status: Pending</h3>
        @endif
    </div>
@endforeach


    <br><br>
@if ($friendships->isEmpty())
    <p>No Friend Request notifications.</p>
@else
    <ul>
        @foreach ($friendships as $friendship)
        @if ($friendship->user->profile_picture)
          <img class="profileInfo" src="{{ asset('storage/' . $friendship->user->profile_picture) }}" alt="Profile Picture">
@else
<img class="profileInfo" src="{{ asset('css/1.png') }}" alt="Profile Picture">
      @endif
                <strong><span class="folder-icon"></span><h3><a href="{{ route('otherProfile', ['id' =>  $friendship->user->id]) }}">{{  $friendship->user->FirstName }}
                                {{ $friendship->user->MiddleName }} {{  $friendship->user->LastName }} {{ $friendship->user->suffix }}</a>
                        </strong> sent you a friend request.
                <form method="POST" action="{{ route('friendship.acceptReject') }}">
    @csrf
    <input type="hidden" name="friendship_id" value="{{ $friendship->id }}">
    
    <button type="submit" name="status" value="accepted">Accept</button>
    <button type="submit" name="status" value="rejected">Reject</button>
</form>



            </li>
        @endforeach
    </ul>
@endif

</div>


</div>




    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="{{ asset('js/script.js') }}"></script>
    


</body>

</html>

