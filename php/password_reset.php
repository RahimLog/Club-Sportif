<?php
include("navbar.php");
include("function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Club Sportif</title>
</head>
<body>
    <div class="container">
            <form action="password_reset_code.php" method="POST">
                <div>Change Password</div>
                <label for="email">Email address</label>    
                <input type="text" id="email" name="email" placeholder="Your email.."><br><br>

                <input type="submit" name="password_reset_link" value="reset"><br><br>
            </form>
    </div>
    
</body>
<a href="password_change.php">password change</a>
</html>
