<?php
    session_start();
    include('inc/connection.php');
    if(isset($_POST['submit'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = " ";
        $birthday_month = ' ';
        $birthday_day = ' ';
        $birthday_year = ' ';

    
        $first =  str_replace(' ','',$first);
        $last =  str_replace(' ','',$last);
        $email =  str_replace(' ','',$email);
        $phone =  str_replace(' ','',$phone);
        
        

        $first =  stripslashes(strtolower($first));
        $last =  stripslashes(strtolower($last));
        $username =  stripslashes(strtolower($username));
        $password =  stripslashes($password);
        $email =  stripslashes($email);
        $phone =  stripslashes($phone);
        
        $first = htmlentities(mysqli_real_escape_string($conn,$first));
        $last = htmlentities(mysqli_real_escape_string($conn,$last));
        $username = htmlentities(mysqli_real_escape_string($conn,$username));
        $password = htmlentities(mysqli_real_escape_string($conn,$password));
        $email = htmlentities(mysqli_real_escape_string($conn,$email));
        $phone = htmlentities(mysqli_real_escape_string($conn,$phone));
        $md5_pass = md5($password);
        

        if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year'])){
            $birthday_day = (int) $_POST['birthday_day'];
            $birthday_month = (int) $_POST['birthday_month'];
            $birthday_year = (int) $_POST['birthday_year'];
            $birthday = $birthday_day.'-'.$birthday_month.'-'.$birthday_year; 
        }

        if(isset($_POST['gender'])){
            $gender = htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
            if(!in_array($gender,['male','female'])){
                $gender_error = '<p id="error">Please choose a gender. </p>';
                $error = 1;
            }
            
        }

        if(empty($first)){
            $first_error = '<p id="error">Please insert first name.</p>';
            $error = 1;
        }
        if(empty($last)){
            $last_error = '<p id="error">Please insert last name.</p>';
            $error = 1;
        }

        if(empty($username)){
            $user_error = '<p id="error">Please insert a username. </p>';
            $error = 1;
        }
        else if(strlen($username) < 6){
            $user_error = '<p id="error">Your username must have a minimum of 6 letters. </p>';
            $error = 1;
        }
        else if(filter_var($username,FILTER_VALIDATE_INT)){
            $user_error = '<p id="error">Please insert a valid username not a number. </p>';
            $error = 1;
        }

        if(empty($password)){
            $pass_error = '<p id="error">Please insert a password. </p>';
            $error = 1;
            

        }
        else if(strlen($password) < 6){
            $pass_error = '<p id="error">Your password must have a minimum of 6 letters. </p>';
            $error = 1;
            

        }
        if(empty($phone)){
            $phone_error = '<p id="error">Please insert phone number.</p>';
            $error = 1;
        }

        if(empty($birthday)){
            $birthday_error = '<p id="error">Please insert a date of birth. </p>';
            $error = 1;
        }

        

        if(empty($email)){
            $email_error = '<p id="error">Please insert an email. </p>';
            $error = 1;

        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error = '<p id="error">Please insert a valid email. </p>';
            $error = 1;
        }
        
        if(empty($_POST['gender'])){
            $gender_error = '<p id="error">Please choose a gender. </p>';
            $error = 1;
        }
        $_SESSION['register_first'] = $first;
        $_SESSION['register_last'] = $last;
        $_SESSION['register_username'] = $username;
        $_SESSION['register_password'] = $password;
        $_SESSION['register_email'] = $email;
        $_SESSION['register_gender'] = $gender;
        $_SESSION['register_phone'] = $phone;
        $_SESSION['register_birthday_month'] = $birthday_month;
        $_SESSION['register_birthday_day'] = $birthday_day;
        $_SESSION['register_birthday_year'] = $birthday_year;
        

        $check_user = "SELECT * FROM users WHERE username='$username'";
        $check_result = mysqli_query($conn,$check_user);
        $num_rows = mysqli_num_rows($check_result);
        if($num_rows != 0){
            $user_error = '<p id="error">Sorry username already exist.</p>';
            $error = 1;
            include_once('register.php');            

        }
        else if(empty($username) || empty($email) || empty($gender) || empty($password) || empty($birthday)){
            $error = 1;
            include_once('register.php');            

        }
            


        if($error == 0 && $num_rows == 0){
            if($gender == 'male'){
                $picture = 'no_profile_picture_male.jpg';
            }
            else if($gender == 'female'){
                $picture = 'no_profile_picture_female.png';
            }
            $cv = 'cv.png';
            $friends = json_encode(array());
            $sql = "INSERT INTO users(first,last,username,password,md5_pass,email,phone,gender,birthday,picture,cv,friends) 
            VALUE ('$first','$last','$username','$password','$md5_pass','$email','$phone','$gender','$birthday','$picture','$cv','$friends')";
            mysqli_query($conn,$sql);
            
            header('location:index.php');
        }
        
    }

   