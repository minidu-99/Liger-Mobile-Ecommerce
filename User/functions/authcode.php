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
    $address1 = mysqli_real_escape_string($con,$_POST['address1']);
    $address2 = mysqli_real_escape_string($con,$_POST['address2']);
    $city = mysqli_real_escape_string($con,$_POST['address3']);
    $postal_code = mysqli_real_escape_string($con,$_POST['address4']);

    $address = $address1 . $address2 . $city . $postal_code;


    //Email check

    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        
        $_SESSION['message'] = "Email already registered";
        header("Location: ../login.php");
    }else
    {
        if($password == $confirm_password){

            // INSERT DATA

            $insert_query = "INSERT INTO users (f_name, l_name, username, phone, email, password,address_one,address_two, address, city, postal_code) VALUES ('$fname','$lname','$username','$phone','$email','$password_hash','$address1','$address2','$address','$city','$postal_code')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){

                $_SESSION['message'] = "Registered Successfully";
                header("Location: ../login.php");
            }else
            {
                $_SESSION['message'] = "Something went wrong";
                header("Location: ../login.php");

            }




        }else
        {
            $_SESSION['message']="Passwords do not match !";
            header("Location: ../login.php");

        }
    }
}

else if(isset($_POST['loginbtn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $get_password_hash = "SELECT password FROM users WHERE email = '$email' ";
    $password_hash_query = mysqli_query($con, $get_password_hash);

    if(mysqli_num_rows($password_hash_query) > 0){
        $password_hash = $password_hash_query->fetch_assoc()['password'];

        if(password_verify($password, $password_hash)){

            $login_query = "SELECT * FROM users WHERE email = '$email' AND password ='$password_hash'";
            $login_query_run = mysqli_query($con, $login_query);

            $_SESSION['auth']=true;
    
            $userdata = mysqli_fetch_array($login_query_run);
            $user_id = $userdata['id'];
            $username = $userdata['username'];
            $useremail = $userdata['email'];
    
    
            $_SESSION['auth_user'] = [
                'user_id'=> $user_id,
                'username' => $username,
                'email' => $useremail
            ];
    
            $_SESSION['message'] = "Logged in Successfuly";
            header("Location: ../home.php");
            
        }else
        {
            $_SESSION['message'] = "Invalid Email or Password";
            header("Location: ../login.php");
        }

    }
    else{
        $_SESSION['message'] = "Invalid Email or Password";
            header("Location: ../login.php");

    }
}

else if(isset($_POST['update_info']))
{
    $user_id = mysqli_real_escape_string($con,$_POST['id']);
    $fname = mysqli_real_escape_string($con,$_POST['f_name']);
    $lname = mysqli_real_escape_string($con,$_POST['l_name']);
    $username = mysqli_real_escape_string($con,$_POST['user_name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone_number']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    

    $address1 = mysqli_real_escape_string($con,$_POST['address1']);
    $address2 = mysqli_real_escape_string($con,$_POST['address2']);
    $city = mysqli_real_escape_string($con,$_POST['address3']);
    $postal_code = mysqli_real_escape_string($con,$_POST['address4']);

    $address = $address1 . $address2 . $city . $postal_code;



            // UPDATE DATA

            $update_query = "UPDATE users 
            SET f_name='$fname', l_name='$lname', username='$username', phone='$phone', email='$email', 
                address_one='$address1', address_two='$address2', address='$address', city='$city', postal_code='$postal_code'
            WHERE id='$user_id'";

            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run){

                $_SESSION['message'] = "Information Updated Successfully";
                header("Location: ../account.php");
            }else
            {
                $_SESSION['message'] = "Something went wrong";
                header("Location: ../account.php");

            }



}else if(isset($_POST['update_password']))
{
    $user_id = mysqli_real_escape_string($con,$_POST['id']);

    $new_password = mysqli_real_escape_string($con,$_POST['new_password']);
    $new_password_confirm = mysqli_real_escape_string($con,$_POST['confirm_password']);


    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    if($new_password ==  $new_password_confirm){

        // UPDATE DATA

        $update_query = "UPDATE users SET password='$password_hash' WHERE id='$user_id'";
        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run){

            $_SESSION['message'] = "Changed the Password Successfully";
            header("Location: ../changepassword.php");
        }else
        {
            $_SESSION['message'] = "Something went wrong";
            header("Location: ../changepassword.php");

        }

    }else
    {
        $_SESSION['message']="Passwords do not match !";
        header("Location: ../changepassword.php");
    }



}

?>