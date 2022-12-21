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
    <link rel="stylesheet" href="..\style\style.css">
    <title>Club Sportif</title>
</head>
<body>
    <div id="navbar">
        <img id= logo src="..\imgage\logo.jpg" alt="logo"  style="width: 60px">
        <div id="navbar-right">
            <a class="active" href="index.php">Home</a>
            <a href="login.php">Log in</a>
            <a href="signup.php">Sign up</a>
            <a href="logout.php">Log out</a>
        </div>
    </div>

    
    <h1> This is the index page</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; 
    ?>
    
</body>
</html>