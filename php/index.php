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
        <link rel="stylesheet" href="../style/style.css">
        <title>Club Sportif</title>
    </head>
    <body>
        <script src="../javaScript/script.js"></script>

        <?php include("navbar.php");?>
        
        <div style="margin-top:230px">
        <p><b>This example demonstrates how to shrink a navigation bar when the user starts to scroll the page.</b></p>
        <p>Scroll down this frame to see the effect!</p>
        <p>Scroll to the top to remove the effect.</p>
        <p><b>Note:</b> We have also made the navbar responsive, resize the browser window to see the effect.</p>
        <p>Lorem ipsum dolor dummy text to enable scrolling, sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
        <h1> This is the index page</h1>

        <br>  Hello, <?php echo $user_data['user_name']; ?>

        <footer><?php include("footer.php"); ?></footer>
       
    </body>
</html>