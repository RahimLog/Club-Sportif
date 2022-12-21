<?php
session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //somthing wass posted$
        $user_name = $_POST['user_name'];
        $user_first_name = $_POST['first_name'];
        $user_last_name = $_POST['last_name'];
        $user_email = $_POST['email'];
        $user_birth_date = $_POST['birth_date'];
        $user_address = $_POST['address'];
        $user_postal_code = $_POST['postal_code'];
        $user_phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
       
        if(!empty($user_name) && !is_numeric($user_name) && !empty($password))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, first_name, last_name, email, birth_date, address, postal_code, phone_number, password) values ('$user_id', '$user_name','$user_first_name', '$user_last_name', '$user_email', '$user_birth_date', '$user_address', '$user_postal_code', '$user_phone_number', '$password')";
            
            mysqli_query($con,$query);

            header("location: login.php");
            die;
            
        }else
        {
            echo "please enter some valide information";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
            <div style="font-size:20px;margin:10; color: white; ">Signup</div>    
            <input id ="text" type="text" name="user_name" placeholder="nom d'utilisateur"><br><br>
            
            <input id ="text" type="text" name="email" placeholder="email"><br><br>
            <input id ="text" type="text" name="first_name" placeholder="first name"><br><br>
            <input id ="text" type="text" name="last_name" placeholder="last name"><br><br>
            <input id ="text" type="text" name="birth_date" placeholder="birth date"><br><br>
            <input id ="text" type="text" name="address" placeholder="address"><br><br>
            <input id ="text" type="text" name="postal_code" placeholder="postal code"><br><br>
            <input id ="text" type="text" name="phone_number" placeholder="phone number"><br><br>
            <input id ="text" type="password" name="password" placeholder="mot de passe"><br><br>

            <input id ="button" type="submit" value="Signup"><br><br>
            <a href="login.php">Click to Login</a><br><br>

        </form>
    </div>
</body>
</html>