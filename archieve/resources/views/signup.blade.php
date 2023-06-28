<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <link href="{{ asset('css/style2.css') }}" rel="stylesheet"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

   <title>Sign Up - Archieve</title>
    
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<image src="css/2.png" style="height: 70px; width: 200px;"></image>

<div class="right">
<ul class="list">
  <li><span class="folder-icon"></span>
<b>Arch</b>ive what you ach<b>ieve</b>...</li>

</div>
</ul>
</nav>
<body >
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif


    <div class="wrapper">
    <p><a href="{{ route('login') }}"><i class="fa fa-reply" style="font-size:24px"></i></a></p>
      <div class="logo">
         <img src="css/1.png" alt="logo">
      </div>
      <div class="text-center mt-4 name">
         Sign Up
      </div>

    <form method="POST" class="p-3 mt-3" action="/signup" onsubmit="return validateForm()">
        @csrf

        <div class="form-field d-flex align-items-center" style="height: 40px;">      
      <span><i class="fas fa-user"></i></span>
            <input type="text" id="FirstName" name="FirstName" placeholder="Enter your First Name" required>
        </div>
        
        <div class="form-field d-flex align-items-center" style="height: 40px;">      
      <span><i class="fas fa-user"></i></span>
            <input type="text" id="MiddleName" name="MiddleName" placeholder="Enter your Middle Name" required>
        </div>
        
        <div class="form-field d-flex align-items-center" style="height: 40px;">      
      <span><i class="fas fa-user"></i></span>
            <input type="text" id="LastName" name="LastName" placeholder="Enter your Last Name" required>
        </div>
        
        <div class="form-field d-flex align-items-center" style="height: 40px;">      
      <span><i class="fas fa-user"></i></span>
            <input type="text" id="suffix" name="suffix" placeholder="Suffix" >
        </div>

            <label for="gender">Gender:</label>
            <div class="form-field d-flex align-items-center">  
            <input type="radio" id="gender_male" name="gender" value="male">
            <label for="gender_male">Male</label>
            <input type="radio" id="gender_female" name="gender" value="female">
            <label for="gender_female">Female</label>
            <input type="radio" id="gender_other" name="gender" value="other">
            <label for="gender_other">Other</label>
        </div>

        <div>
            <label for="birthdate">Birthdate:</label>
            <input class="form-field" type="date" id="birthdate" name="birthdate" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea class="form-field" id="address" name="address" required></textarea>
        </div>

        <div class="form-field d-flex align-items-center" style="height: 40px;">      
      <span><i class="fas fa-user"></i></span>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>
      
      <div class="form-field d-flex align-items-center" style="height: 40px;">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>

      <div class="form-field d-flex align-items-center" style="height: 40px;">
        <i class="fas fa-lock"></i>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
        </div>
        
        <button type="submit" class="btn mt-3" name="submit"><i class="fa fa-send" style="font-size:18px"></i> Submit</button>
        
    </form>
</body>
</html>
