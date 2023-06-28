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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
        <h2>Welcome to your Home Page, {{ Auth::user()->FirstName }} {{ Auth::user()->MiddleName }} {{ Auth::user()->LastName }} {{ Auth::user()->suffix }}!</h2>
      </div>
    
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <textarea name="content" placeholder="What's on your mind?" rows="4" cols="50" required></textarea>
            <br>
    <div>
    <label for="post_picture" class="upload-label">
  <i class="fas fa-image"></i> Upload Photo
</label>
<input type="file" id="post_picture" name="post_picture" accept="image/*" class="image-input">

    </div>

    <button type="submit" class="post-button">
  <i class="fas fa-paper-plane"></i> Post
</button>

        </form>


        <div class="posts-section">
    <h1><b>People's Archives:</b></h1>
    @if (count($posts) > 0)
        <table class="posts-table">
            <tbody>
                @foreach($posts->sortByDesc('created_at') as $post)
                    @if ($post->account->isFriendOf(Auth::user()))
                        <div class="post">
                            @if($post->account->profile_picture)
                                <div class="post__user">
                                    <div class="profile-header">
                                        <img class="profileInfo" src="{{ asset('storage/' . $post->account->profile_picture) }}" alt="Profile Picture">
                                    </div>
                                @else
                                <div class="post__user">
                                    <div class="profile-header">
                                        <img class="profileInfo" src="css/1.png" alt="Profile Picture">
                                    </div>
                            @endif
                            <a href="{{ route('otherProfile', ['id' => $post->account->id]) }}">{{ $post->account->FirstName }} {{$post->account->MiddleName}} {{ $post->account->LastName }} {{$post->account->suffix}}</a>
                            <br>
                            <span class="post__date">{{ $post->created_at }}</span>
                        </div>
                        <div class="post__body">
                            {{ $post->content }} <br> <br>
                            @if ($post->post_picture)
                                <img class="post_picture" src="{{ asset('storage/' . $post->post_picture) }}" alt="Post Picture">
                            @endif 
                            <br>
                            {{ $post->likes->count() }}
                            @if($post->isLikedByUser(Auth::user()->id))
                                <form method="POST" action="{{ route('posts.unlike', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="undoheart"></button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('posts.like', $post->id) }}">
                                    @csrf
                                    <button type="submit" class="heart"></button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
            <p>No more posts found.</p>
        </tbody>
    </table>
@else
    <p>No posts found.</p>
@endif
</div>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
