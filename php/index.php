<?php 
session_start();
    include("connection.php");
    include("function.php");

    $user_data = check_login($con);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Sportif</title>
</head>
<body>
    <nav>
        
    </nav>











    <a href="logout.php">Logout</a>
    <a href="login.php">Login</a>
    <a href="signup.php">Signup</a>
    <h1> This is the index page</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; 
    ?>
    
</body>
</html>