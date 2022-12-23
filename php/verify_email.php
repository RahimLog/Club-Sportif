<?php
session_start();
    include("connection.php");
    include("function.php");

    if (isset($_GET['token'])) 
    {
        $token = $_GET['token'];
        $verify_query = "SELECT verify_token, verify_status FROM users WHERE verify_token='$token' LIMIT 1";
        $verify_query_run = mysqli_query($con,$verify_query);

        if (mysqli_num_rows($verify_query_run)>0) 
        {
            $row = mysqli_fetch_array($verify_query_run);
            //echo $row['verify_token'];
            if ($row['verify_status']==0) 
            {
                $clicked_token = $row['verify_token'];
                $update_query = "UPDATE users SET verify_status='1' WHERE verify_token= '$clicked_token' LIMIT 1";
                $update_query_run = mysqli_query($con,$update_query);

                if ($update_query_run) 
                {
                    $_SESSION['status'] = "Your account has been verified successfully. ";
                    header("location: login.php");
                    exit(0);
                }
                else 
                {
                    $_SESSION['status'] = "Verification failed.";
                    header("location: login.php");
                    exit(0);
                    
                }
            }
            else
            {
                $_SESSION['status'] = "Email already verified. please login.";
                header("location: login.php");
                exit(0);
                
            }
        }
        else 
        {
            $_SESSION['status'] = "Not Allowed.";
            header("location: login.php");
            exit(0);
        }
        
    }
    else 
    {
        $_SESSION['status'] = "This token does not exist.";
        header("location: login.php");
        exit(0);
    }
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
    <div>
        <?php  include("navbar.php");  ?>
    </div>

    <?php  //$_SESSION['status'] = "just for test";  ?>
    

    <div class="container">
        <div class="alert">
            <?php if (isset($_SESSION['status'])) {
                echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            } ?>

        </div>
        
        <form method="post" action="code.php">
            <div>Confirmation</div>  

            <label for="user_name">User name</label>
            <input id ="text" type="text" name="user_name" placeholder="Your user name.."><br>
            
            <label for="email">Email</label>
            <input id ="text" type="text" name="email" placeholder="Your email.."><br>

            <label for="first_name">First name</label>
            <input id ="text" type="text" name="first_name" placeholder="Your first name"><br>

            <label for="last_name">Last name</label>
            <input id ="text" type="text" name="last_name" placeholder="Your last name"><br>

            <label for="password">Password</label>
            <input id ="text" type="password" name="password" placeholder="Your mot de passe"><br>

            <input id ="button" type="submit" name="register_btn"><br><br>
            

        </form>
    </div>

    <footer><?php include("footer.php"); ?></footer>
</body>
</html>