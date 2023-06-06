<?php
include("database.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to css file  -->
    <link rel="stylesheet"href="style.css">
    <title>Login-form</title>
</head>
<body>
    <div class="container">

    <form action="login.php" method="post">
        <h3>Login</h3>
        <label>Username</label><br>
<input type="name" name="username" placeholder="Enter your name"> <br>
<label>Password</label><br>
<input type="password" name="password" placeholder="Enter your password"> <br> 
<input type="submit" value="Log in" name="submit" class="login-btn"> 
<p>Don't you have an account? <a href="register.php"> Register now</a> </p>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    echo "Hello {$username} <br>";
    if(mysqli_num_rows($result) > 0){
       header("Location: header.php");
       exit;
    } else {
        echo "Invalid username / password";
    }
    // Close the database connection
    mysqli_close($connection);
} 
?>