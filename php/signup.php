<?php
session_start();
    include("connection.php");
    include("function.php");

    // if($_SERVER['REQUEST_METHOD'] == "POST")
    // {
    //     //somthing wass posted$
    //     $user_name = $_POST['user_name'];
    //     $user_first_name = $_POST['first_name'];
    //     $user_last_name = $_POST['last_name'];
    //     $user_email = $_POST['email'];
    //     $user_birth_date = $_POST['birth_date'];
    //     $user_address = $_POST['address'];
    //     $user_postal_code = $_POST['postal_code'];
    //     $user_phone_number = $_POST['phone_number'];
    //     $password = $_POST['password'];
    //     $password = password_hash($password,PASSWORD_DEFAULT);
       
    //     if(!empty($user_name) && !is_numeric($user_name) && !empty($password))
    //     {
    //         //save to database
    //         $user_id = random_num(20);
    //         $query = "insert into users (user_id, user_name, first_name, last_name, email, birth_date, address, postal_code, phone_number, password) values ('$user_id', '$user_name','$user_first_name', '$user_last_name', '$user_email', '$user_birth_date', '$user_address', '$user_postal_code', '$user_phone_number', '$password')";
            
    //         mysqli_query($con,$query);
    //         header("location: login.php");
    //         die;
            
    //     }else
    //     {
    //         echo "please enter some valide information";
    //     }
    // }
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
    
    <div class="container">
        <form method="post" action="code.php">
            <div class="alert">
                <?php if (isset($_SESSION['status'])) {
                    echo "<h4>".$_SESSION['status']."</h4>";
                    unset($_SESSION['status']);
                } ?>
            </div>
            <div>Signup</div>  

            <label for="user_name">User name</label>
            <input id ="text" type="text" name="user_name" placeholder="Your user name.."><br>
            
            <label for="email">Email</label>
            <input id ="text" type="text" name="email" placeholder="Your email.."><br>

            <label for="first_name">First name</label>
            <input id ="text" type="text" name="first_name" placeholder="Your first name"><br>

            <label for="last_name">Last name</label>
            <input id ="text" type="text" name="last_name" placeholder="Your last name"><br>

            <label for="birth_date">Birth date</label>
            <input id ="text" type="text" name="birth_date" placeholder="Your birth date"><br>

            <label for="address">Address</label>
            <input id ="text" type="text" name="address" placeholder="Your address"><br>

            <label for="postal_code">Postal code</label>
            <input id ="text" type="text" name="postal_code" placeholder="Your postal code"><br>

            <label for="phone_number">Phone number</label>
            <input id ="text" type="text" name="phone_number" placeholder="Your phone number"><br>

            <label for="password">Password</label>
            <input id ="text" type="password" name="password" placeholder="Your mot de passe"><br>

            <input id ="button" type="submit" name="register_btn"><br><br>
            
            <a href="login.php">Click to Login if you have an account</a><br>

        </form>
    </div>
    <div>
        <p><b>This example demonstrates how to shrink a navigation bar when the user starts to scroll the page.</b></p>
        <p>Scroll down this frame to see the effect!</p>
        <p>Scroll to the top to remove the effect.</p>
        <p><b>Note:</b> We have also made the navbar responsive, resize the browser window to see the effect.</p>
        <p>Lorem ipsum dolor dummy text to enable scrolling, sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    
    <footer><?php include("footer.php"); ?></footer>
</body>
</html>