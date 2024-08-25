<?php 
session_start();
 if (!isset($_SESSION['username'])){
        header('location: login.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Profile</title>
    <link href="home.css" rel="stylesheet">
    
  </head>
  <body>
    <div class="profile-container text-center">
      <img src="./web.png" >
      <div class="profile-info">
        <h1><?=$_SESSION['name']?></h1>
        <p><strong>Email</strong><?=$_SESSION['email']?></p>
        <p><strong>Username:</strong><?=$_SESSION['username']?></p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
