<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<link href="{{ asset('css/styleP.css') }}" rel="stylesheet"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,400;0,600;1,400;1,600&amp;display=swap'>
    <link rel="stylesheet" href="css/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

    <div class="wrapper">
    <p><a href="{{ route('profile') }}"><i class="fa fa-reply" style="font-size:24px"></i></a></p>
    <br>
    <div class="text-center mt-5 name">
            Update Profile Information
        </div>
        <br>

        <!-- Update Form -->
        <form method="POST" class="p-3 mt-3" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Add form fields for updating account information -->
            <div class="form-field d-flex align-items-center" >      
                <span> <i style="font-size: 15px;" class="fas fa-user"></i> First Name:</span>
                <input style="font-size: 15px;" class="form-field"type="text" id="FirstName" name="FirstName" value="{{ Auth::user()->FirstName }}" required>
            </div>

            <div class="form-field d-flex align-items-center" >      
      <span><i style="font-size: 15px;" class="fas fa-user"> </i> Middle Name:</span>
                <input style="font-size: 15px;" class="form-field" type="text" id="MiddleName" name="MiddleName" value="{{ Auth::user()->MiddleName }}" required>
            </div>

            <div class="form-field d-flex align-items-center" >      
      <span><i style="font-size: 15px;" class="fas fa-user"> </i> Last Name:</span>
                <input style="font-size: 15px;" class="form-field" type="text" id="LastName" name="LastName" value="{{ Auth::user()->LastName }}" required>
            </div>

            <div class="form-field d-flex align-items-center" >      
      <span><i style="font-size: 15px;" class="fas fa-user"> </i> Suffix:</span>
                <input style="font-size: 15px;" class="form-field" type="text" id="suffix" name="suffix" value="{{ Auth::user()->suffix }}">
            </div>

                
                    <label for="gender" value="{{ Auth::user()->suffix }}">Gender:</label>
                    
                    <input type="radio" id="gender_male" name="gender" value="male">
                    <label for="gender_male">Male</label>
                    <input type="radio" id="gender_female" name="gender" value="female">
                    <label for="gender_female">Female</label>
                    <input type="radio" id="gender_other" name="gender" value="other">
                    <label for="gender_other">Other</label> <br> <br>
                    <label for="civil_status" value="{{ Auth::user()->civil_status }}">Civil Status:</label>
                    
                  
                     <br> <br>

                <div>
                    <label for="birthdate">Birthdate:</label>
                    <input style="font-size: 15px;"class="form-field" type="date" id="birthdate" name="birthdate" required value="{{ Auth::user()->birthdate}}">
                </div>

                <div>
                    <label for="address">Address:</label>
                    <input style="font-size: 15px;"class="form-field" type="address" id="address" name="address" required value="{{ Auth::user()->address}}">
                </div>
               
                <label for="civil_status" value="{{ Auth::user()->civil_status }}">Civil Status:</label>
                    
                <input type="radio" id="civil_status_Single" name="civil_status" value="Single">
                    <label for="civil_status_Single">Single</label>
                    <input type="radio" id="civil_status_Married" name="civil_status" value="Married">
                    <label for="civil_status_Married">Married</label>
                    <input type="radio" id="civil_status_Divorced" name="civil_status" value="Divorced">
                    <label for="civil_status_Divorced">Divorced</label>
                    <input type="radio" id="civil_status_Widowed" name="civil_status" value="Widowed">
                    <label for="civil_status_Widowed">Widowed</label>
                    <input type="radio" id="civil_status_Separated" name="civil_status" value="Separated">
                    <label for="civil_status_Separated">Separated</label>
                    
                     <br> <br>
              
                <div>
                    <label for="nationality">Nationality:</label>
                    <input style="font-size: 15px;"class="form-field" type="text" id="nationality" name="nationality" required value="{{ Auth::user()->civil_status}}">
                </div>

            <!-- Add other form fields for other account information -->

          

            <!-- Add submit button -->
            <button type="submit" class="btn mt-3" name="submit"><i class="fa fa-send" style="font-size:18px"></i> Update</button>
        </form>

    </div>

    <main>

        <div class="wrapper">
            <div class="logo">
                @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="profileInfo" alt="some user image">
                @else
                <img src="{{ asset('images/default_profile.jpg') }}" class="profileInfo" alt="default user image">
                @endif
            </div><br>
            <div class="text-center mt-4 name">
                 {{ Auth::user()->FirstName }} {{ Auth::user()->MiddleName }} {{ Auth::user()->LastName }} {{ Auth::user()->suffix }}
                 <br><br><h1>@ {{ Auth::user()->email }}</h1><br>
                <h1><strong> ●BIO </strong></h1>
                <h3><br>
                    {{Auth::user()->bio}}

                    <form method="POST" class="p-3 mt-3" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-field d-flex align-items-center">      

                            <label for="bio">Edit Bio:</label>
                            <input class="form-field" type="text" name="bio" id="bio">
                        </div>
  <!-- Add field for profile picture update -->
  <div class="form-field">
                <label for="profile_picture">Profile Picture</label>
                <input class="form-field" type="file" id="profile_picture" name="profile_picture" accept="image/*">
            </div>
                        <!-- Add submit button -->
                        <button type="submit" class="btn mt-3" name="submit"><i class="fa fa-send" style="font-size:18px"></i> Update</button>
                    </form>

                    @csrf

                </h3>

    </main>
    <!-- Profile Information Section -->
    <div class="profile-information">
        <!-- Display user information here -->
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>