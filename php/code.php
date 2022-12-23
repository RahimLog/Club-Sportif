<?php 
session_start();
include('connection.php');
include('function.php');

if(isset($_POST['register_btn']))
{
    $user_name = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // Email Exists or not in the database

    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con,$check_email_query);
    
    if (mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['status'] = "Email already exists";
        header("location: signup.php");
    }
    else
    {
        // Insert user / Registred user data
        $query = "INSERT INTO users (user_name, last_name, first_name, email, password, verify_token, phone_number, address, postal_code, birth_date) VALUES ('$user_name','$last_name', '$first_name', '$email', '$password', '$verify_token', '$phone_number', '$address', '$postal_code', $birth_date)";
        
        $query_run = mysqli_query($con, $query);

        if ($query_run)
        {
            sendemail_verify("$user_name","$email","$verify_token");
            $_SESSION['status'] = "Signup successfull.! please verifiy your Email Address.";
            header("location: signup.php");
        }
        else 
        {
            $_SESSION['status'] = "Signup failed";
            header("location: signup.php");
        }

    }
}
?>