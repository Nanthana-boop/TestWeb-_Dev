<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'server.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        try{
            $sql = "INSERT INTO users (name, email, phone, username, password) VALUES ('{$_POST['name']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['username']}','{$_POST['password']}') ";
        $result = $conn->query($sql);
        
        mysqli_close($conn);
        header("Location: ./login.php");
        } catch(Exception $e){
            echo $e;
        }
        
    } else {
        http_response_code(400); 
        echo json_encode(array("message" => "Incomplete data."));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
    <link href="register.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-register">
      <form action="" method="POST">
      <img class="mb-4" src="profile (2).png" >
        <h1 class="h3 mb-3 fw-normal">Please Register</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingName" name="name" placeholder="Full Name" required>
          <label for="floatingName">Full Name</label>
        </div>
        <h1 class="mb-2"></h1>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
          <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating">
          <input type="phone" class="form-control" id="floatingEmail" name="phone" placeholder="Phone" required>
          <label for="floatingEmail">Phone</label>
        </div>
        <h1 class="mb-2"></h1>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingUsername" name="username" placeholder="Username" required>
          <label for="floatingUsername">Username</label>
        </div>
        <h1 class="mb-2"></h1>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <h1 class="mb-4"></h1>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <h1 class="mb-3"></h1>
        <p>Already a member? <a href="login.php">Sign in</a></p>
      </form>
    </main>
  </body>
</html>
