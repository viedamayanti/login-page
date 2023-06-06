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
    <title>Register form</title>
</head>
<body>
    <div class="container">
   
    <form action="" method="post">
    <h3>Register</h3>
        <label>Username</label><br>
<input type="name" name="username" placeholder="Enter your name" required> <br>
<label>Email</label><br>
<input type="email" name="email" placeholder="Enter your email" required> <br>
<label>Password</label><br>
<input type="password" name="password" placeholder="Enter your password" required> <br>
<input type="submit" value="Register" name="submit" class="reg-btn"> 
<p>You already have an account? <a href="login.php"> Login now</a> </p>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    //Retrieve the user input from the form
    $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS );
    $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_SPECIAL_CHARS );
    $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS );
    $hash = password_hash($password, PASSWORD_DEFAULT);
    try{
    $sql = "INSERT INTO users (user, password, email)
         VALUES ('$username', '$hash', '$email')";
        mysqli_query($connection, $sql);
        header('Location:login.php');

    } catch (mysqli_sql_exception $e) {
        echo "Caught error: " . $e->getMessage();
        exit();
    }
 
     // Close the database connection
    mysqli_close($connection);
}   
?>