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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>Login - Archieve</title>
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

    <div class="wrapper">
      <div class="logo">
         <img src="css/1.png" alt="logo">
      </div>
      <div class="text-center mt-4 name">
         Login
      </div>

    <form method="POST" class="p-3 mt-3" action="{{ route('login') }}">
        @csrf

   
    <div class="form-field d-flex align-items-center">      
      <span><i class="fas fa-user"></i></span>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>
      
      <div class="form-field d-flex align-items-center">
        <i class="fas fa-lock"></i>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>
    
    <button type="submit" class="btn mt-3" name="login"><i class="fa fa-id-badge" style="font-size:18px"></i> Login</button>
    <div class="alternative-signup">
        <p class="text-center mt-3">
            <a href="{{ route('signup') }}" class="btn mt-3"><i class="fa fa-user-plus" style="font-size:18px"></i> Sign Up </a>
         </p>
         <p><span><a href="#">Forgot Password?</a></span></p>
    </div>
  </section>
</body>
</html>
