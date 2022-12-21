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
    <title>Login</title>
</head>
<body>
    <style type="text/css">
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }
        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <div id="box">
        
        <form method="post">
            <div style="font-size:20px;margin:10; color: white; ">Login</div>    
            <input id ="text" type="text" name="user_name" placeholder="nom d'utilisateur"><br><br>
            <input id ="text" type="password" name="password" placeholder="mot de passe"><br><br>
            <a href="forgetpassword.php">Forgot password?</a><br><br>
            <input id ="button" type="submit" value="Login"><br><br>
            Don't have an account? <a href="signup.php">Signup</a>


        </form>

    </div>
    <div>
    <a href="http://clubsportif/php/index.php">page index</a>
    </div>
    <div>
    <a href="logout.php">page logout</a>
    </div>
</body>
</html>