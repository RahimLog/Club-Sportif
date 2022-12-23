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
                <input type="text" name="password_token"  value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                <div>Reset Password</div>
                <label for="email">Email address</label>    
                <input type="text" id="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" placeholder="Your user email.."><br><br>

                <label for="password">New Password</label>
                <input id ="text" type="password" name="new_password" placeholder="Your password.."><br><br>
                
                <label for="password"> Confirm Password</label>
                <input id ="text" type="password" name="confirm_password" placeholder="Your password.."><br><br>

                <input type="submit" name="password_update" value="Update Password"><br><br>
            </form>
    </div>
    
</body>
</html>
