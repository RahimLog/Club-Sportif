<?php
session_start();
    include("connection.php");
    include("function.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //somthing wass posted$
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !is_numeric($user_name) && !empty($password))
        {
            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con,$query);
            if ($result) 
            {
                if($result  && mysqli_num_rows($result) > 0 )
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        if (password_verify($password, $user_data['password'])==true) 
                        {   
                            $_SESSION['user_id']= $user_data['user_id'];
                            header("location: index.php");
                            die;
                        }
                    }
            }
            echo "Wrong username or password";
        }else
        {
            echo "Wrong username or password";
        }
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
    <div> <?php  include("navbar.php");  ?> </div> 
    <div class="container">
        <div class="alert">
            <?php if (isset($_SESSION['status'])) {
                echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            } ?>
        </div>
        <form method="post">
            <div>Login</div>
            <label for="user_name">User name</label>    
            <input type="text" id="user_name" name="user_name" placeholder="Your user name.."><br><br>

            <label for="password">Password</label> 
            <input type="password" id ="password" name="password" placeholder="Your password.."><br><br>

            <a href="password_reset.php">Forgot password?</a><br><br>
            <input type="submit" value="Login"><br><br>
            Don't have an account? <a href="signup.php">Signup</a>
        </form>
        </div>
    </div>
    
    <footer><?php include("footer.php"); ?></footer>
</body>
</html>