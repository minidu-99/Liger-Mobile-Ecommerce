<?php

session_start();
include("../database/dbcon.php");

if(isset($_POST['registerbtn']))
{
    $fname = mysqli_real_escape_string($con,$_POST['f_name']);
    $lname = mysqli_real_escape_string($con,$_POST['l_name']);
    $username = mysqli_real_escape_string($con,$_POST['user_name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone_number']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);


    //Email check

    $check_email_query = "SELECT email FROM admin WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        
        $_SESSION['message'] = "Email already registered";
        header("Location: ../settings.php");
    }else
    {
        if($password == $confirm_password){

            // INSERT DATA

            $insert_query = "INSERT INTO admin (f_name, l_name, user_name, email, phone,  password) VALUES ('$fname','$lname', '$username', '$email','$phone','$password_hash')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){

                $_SESSION['message'] = "Registered Successfully";
                header("Location: ../settings.php");
            }else
            {
                $_SESSION['message'] = "Something went wrong";
                header("Location: ../settings.php");

            }




        }else
        {
            $_SESSION['message']="Passwords do not match !";
            header("Location: ../settings.php");

        }
    }
}

else if(isset($_POST['loginbtn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $get_password_hash = "SELECT password FROM admin WHERE email = '$email' ";
    $password_hash_query = mysqli_query($con, $get_password_hash);

    if(mysqli_num_rows($password_hash_query) > 0){
        $password_hash = $password_hash_query->fetch_assoc()['password'];

        if(password_verify($password, $password_hash)){

            $login_query = "SELECT * FROM admin WHERE email = '$email' AND password ='$password_hash'";
            $login_query_run = mysqli_query($con, $login_query);

            $_SESSION['auth_admin']=true;
    
            $userdata = mysqli_fetch_array($login_query_run);
            $username = $userdata['user_name'];
            $useremail = $userdata['email'];
    
    
            $_SESSION['auth_admin_data'] = [
                'username' => $username,
                'email' => $useremail
            ];
    
            $_SESSION['message'] = "Welcome to Liger Mobile Dashboard";
            header("Location: ../dashboard.php");
            
        }else
        {
            $_SESSION['message'] = "Invalid Email or Password";
            header("Location: ../loging.php");
        }

    }
    else{
        $_SESSION['message'] = "Invalid Email or Password";
            header("Location: ../loging.php");

    }
}