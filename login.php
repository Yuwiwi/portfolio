<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "portfolio";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

        $query = "SELECT * FROM admin_user WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        if($result->num_rows == 1) {
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('admin.php','_self')</script>";  

        } else {
          echo "<script>alert('Invalid, please try again!')</script>";
        }

        $conn->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body class="login0">

    <div class="wrapper">
      <form action="#" method="POST">
        <h2>Hello, Yuri!</h2>
          <div class="input-field">
          <input type="text" id="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-field">
          <input type="password" id="password" name="password" required>
          <label>Password</label>
        </div>
        <button type="submit">Log In</button>
      </form>
    </div>


    <script src="script.js"></script>
</body>
</html> 

