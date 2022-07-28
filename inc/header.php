<?php
        session_start();
        include 'configuration/config.php';
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <title>My Gym</title>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark py-4">
    <a class="navbar-brand ms-5" href="index.php">MY GYM</a>
    <button class="navbar-toggler me-3" type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item active me-5">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item me-5">
        <a class="nav-link" href="#">Gyms</a>
      </li>
      <li class="nav-item me-5">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item me-5">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
            <?php echo isset($_SESSION['name'])? 
                '<a href="dashboard.php" style="border-radius:4px;" 
                class="btn btn-outline-light me-3" role="button">Dashboard</a>'
                :'<a href="login.php" style="border-radius:4px;" class="btn btn-outline-light me-3" 
                role="button">Login</a>';
            ?>
            <?php 
                if(isset($_SESSION['name'])){
                    echo '<a href="logout.php" style="border-radius:4px;" 
                    class="btn btn-outline-light ms-3 me-3" role="button">Logout</a>';
                }else{
                    echo '<a href="signup.php" style="border-radius:4px;" 
                    class="btn btn-outline-light ms-3 me-3" role="button">Sign up</a>';
                }
            ?>    
    </div>
</nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                
                
            </div>
            <div class="col">
            
            </div>
        </div>
    </div>