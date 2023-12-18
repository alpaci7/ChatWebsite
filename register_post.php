<?php
    include('inc/connection.php');
    if(isset($_POST['submit'])){

        $username =  htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
        $email =  htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
        $password =  htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
        $md5_pass = md5($password);

        $username = stripcslashes(strtolower($username));
        $email = stripcslashes($email);
        $password = stripcslashes($password);
       
        if(isset($_POST['birthday_month']) && isset($_POST['birthday_day']) && isset($_POST['birthday_year'])){
            $birthday_month = (int)$_POST['birthday_month']; 
            $birthday_day = (int)$_POST['birthday_day'];
            $birthday_year = (int)$_POST['birthday_year'];
            $birthday = htmlentities(mysqli_real_escape_string($conn,$birthday_day.'-'.$birthday_month.'-'.$birthday_year));
        }
        if(isset($_POST['gender'])){
            $gender = htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
            if(!in_array($gender,['male','female'])){
                $gender_error = '<p id="error">Please choose a gender</p> ';
                $error = 1;
            }
        }

        $check_user = "SELECT * FROM `users` WHERE username='$username'";
        $check_result = mysqli_query($conn,$check_user);
        $num_rows = mysqli_num_rows($check_result);
        if($num_rows != 0){
            $user_error = '<p id="error">Sorry username already exist</p>';
            $error = 1;
        }

        if(empty($username)){
            $user_error = '<p id="error">Please insert an username</p> ';
            $error = 1;
        }
        else if(strlen($username) < 6){
            $user_error = '<p id="error">Your username needs to have a minimum of 6 letters</p> ';
            $error = 1;
        }
        else if(filter_var($username,FILTER_VALIDATE_INT)){
            $user_error = '<p id="error">Please insert a valid username not a number</p> ';
            $error = 1;
        }

        if(empty($email)){
            $email_error = '<p id="error">Please insert an email</p> ';
            $error = 1;
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error = '<p id="error">Please insert a valid email</p> ';
            $error = 1;
        }

        if(empty($gender)){
            $gender_error = '<p id="error">Please choose a gender</p> ';
            $error = 1;
        }

        if(empty($birthday)){
            $birthday_error = '<p id="error">Please insert date of birthday</p> ';
            $error = 1;
        }

        if(empty($password)){
            $pass_error = '<p id="error">Please insert a password</p>';
            $error = 1;
            include('register.php');
        }
        else if(strlen($password) < 6){
            $pass_error = '<p id="error">Your password needs to have a minimum of 6 letters</p>';
            $error = 1;
            include('register.php');
        }

        
        if(($error == 0) && ($num_rows == 0)){
            $sql = "INSERT INTO users(username,email,password,birthday,gender,md5_pass)
            VALUES ('$username','$email','$password','$birthday','$gender','$md5_pass')";
            mysqli_query($conn,$sql);
            
            header('location:index.php');
        }
        else{
            include('register.php');
        }

    
    }