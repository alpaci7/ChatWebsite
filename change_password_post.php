<?php
    session_start();
    include('inc/connection.php');
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        if(isset($_POST['submit'])){
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            $password1 = stripcslashes($password1);
            $password2 = stripcslashes($password2);

            $password1 = htmlspecialchars($password1);
            $password2 = htmlspecialchars($password2);

            $password1 = htmlentities(mysqli_real_escape_string($conn,$password1));
            $password2 = htmlentities(mysqli_real_escape_string($conn,$password2));


            if(empty($password1) && empty($password2)){
                $pass_error = '<p id="error">Please insert a password</p>';
                $error = 1;
                include_once('change_password.php');
            }
            
            if($password1 != $password2){
                $pass_error = '<p id="error">Password doesn\'t match</p>';
                $error = 1;
                include_once('change_password.php');

            }
            if(strlen($password1)<6 && strlen($password1)<6){
                $pass_error = '<p id="error">Your password must have a minimum of 6 letters and numbers</p>';
                $error = 1;
                include_once('change_password.php');
            }
            
            if($error == 0){
                $md5_pass = md5($password1);
                $sql = "UPDATE users SET password='$password1' WHERE username='$username' AND id='$id'";
                mysqli_query($conn,$sql);
                header('location:home.php');

            }



        }
    }    