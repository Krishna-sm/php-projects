<?php
 session_start();
 session_regenerate_id();
 include './inc/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
 
    <title>Document</title>   
    <link rel="stylesheet" href="./style/bootstrap.min.css"  >
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">AiAuth</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      
          <?php
      if(isset($_SESSION['user'])):
          ?>
        <li class="nav-item dropdown  ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?= $_SESSION['user']  ?>
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="/change-password.php">Change Password</a></li>
            
            <li>
                <form method="post" action="index.php">
                <button name="logoutButton" class="dropdown-item" href="#">Logout</button>
                </form>

            </li>
            <li><hr class="dropdown-divider"></li>
           </ul>
        </li>
        <?php
     else:
          ?>
      
        <li class="nav-item mx-2">
          <a class="  btn btn-danger" href="/login.php">Login</a>
        </li>

        <li class="nav-item mx-2">
          <a class="  btn btn-outline-primary" href="/register.php">Register</a>
        </li>

        <?php
      endif;
          ?>
      </ul>
      
    </div>
  </div>
</nav>