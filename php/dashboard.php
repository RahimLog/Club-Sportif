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
        <title>dashboard</title>
    </head>
    <body>
        <script src="../javaScript/script.js"></script>

        <?php include("navbar.php");?>
        
        <div style="margin-top:230px">  </div>
        

        <footer><?php include("footer.php"); ?></footer>
       
    </body>
</html>