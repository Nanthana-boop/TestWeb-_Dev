<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'server.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        try{
            $sql = "SELECT * FROM `users` WHERE username='{$_POST['username']}'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if($_POST['password']==$row['password']){
                    $_SESSION['name']=$row['name'];
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                header("Location: ./home.php");
                }
            }
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        } catch(Exception $e){
            echo $e;
        }
        
    } else {
        http_response_code(400); // รหัสสถานะ 400 หมายถึงคำขอไม่สมบูรณ์
        echo json_encode(array("message" => "Incomplete data."));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="text-center bg-light">

    <main class="form-signin">
        <form method='POST' action=''>
            <img class="mb-4" src="profile (2).png">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <label>Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label>Password</label>
            </div>

            <div class="checkbox mb-3">
            
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <h1 class="mb-3"></h1>
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
    </main>

</body>

</html>