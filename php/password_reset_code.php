<?php 
    session_start();
    include("connection.php");
    include("function.php");
    
    if (isset($_POST['password_reset_link'])) {
        $email = mysqli_escape_string($con,$_POST['email']);
        $token = md5(rand());

        $ckeck_email = "SELECT  email FROM users where email = '$email' LIMIT 1";
        $check_email_run = mysqli_query($con,$ckeck_email);
        if (mysqli_num_rows($check_email_run)>0) {
            $row = mysqli_fetch_array($check_email_run);
            $get_user_name = $row['user_name'];
            $get_email = $row['email'];

            $update_token = "UPDATE users SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
            $update_token_run = mysqli_query($con,$update_token);

            if ($update_token_run) {
                send_password_reset($get_user_name,$get_email,$token);
                $_SESSION['status'] = "We emailed you a password reset link";
                header("location: password_reset.php");
                exit(0);
            }
            else {
                $_SESSION['status'] = "Something went wrong. #1";
                header("location: password_reset.php");
                exit(0);
            }
        }
        else {
            $_SESSION['status'] = "No Email found";
            header("location: password_reset.php");
            exit(0);
        }

    }

    if ( isset($_POST['password_update'])) {
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $new_password = mysqli_real_escape_string($con,$_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
        $token = mysqli_real_escape_string($con,$_POST['password_token']);

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && !empty($confirm_password))
            {
                // checking token is valid or not
                $check_token = "SELECT verify_token FROM users WHERE verify_token = '$token' LIMIT 1";
                $check_token_run = mysqli_query($con, $check_token);

                if(mysqli_num_rows($check_token_run)>0)
                {
                    if($new_password==$confirm_password)
                    {
                        $update_password = "UPDATE users SET password = '$new_password' WHERE verify_token = '$token' LIMIT 1 ";
                        $update_password_run = mysqli_query($con, $update_password);

                        if($update_password_run)
                        {
                            $new_token = md5(rand())."funda";
                            $update_to_new_token = "UPDATE users SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1 ";
                            $update_to_new_token_run = mysqli_query($con, $update_to_new_token);

                            $_SESSION['status'] = "New password successfully updated.";
                            header("location: loging.php");
                            exit(0);

                        }
                        else
                        {
                            $_SESSION['status'] = "Dit not update password.Something went wrong!";
                            header("location: password_change.php?$token=$token&email=$email");
                            exit(0);
                        }
                    }
                    else
                    {
                        $_SESSION['status'] = "Password and Confirm Password do not match";
                        header("location: password_change.php?$token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = "Invalid token";
                    header("location: password_change.php?$token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "All Fields are Mandetory";
                header("location: password_change.php?$token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "No token Available";
            header("location: password_change.php");
            exit(0);
        }
    }
?>