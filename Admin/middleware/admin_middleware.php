<?php
 if($_SESSION['auth_admin']!=true){

    $_SESSION['message'] = "Log in to continue";
            header("Location: ./loging.php");
 }



?>