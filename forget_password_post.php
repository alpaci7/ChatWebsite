<?php 
session_start();
include('inc/connection.php');
//error_reporting(0);
if(isset($_POST['submit'])){
    $first = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $error = 0;

    $first = str_replace(" ","",$first);
    $last = str_replace(" ","",$last);
    $username = str_replace(" ","",$username);
    $email = str_replace(" ","",$email);
    $phone = str_replace(" ","",$phone);

    $first = htmlentities(mysqli_real_escape_string($conn,$first));
    $last = htmlentities(mysqli_real_escape_string($conn,$last));
    $username = htmlentities(mysqli_real_escape_string($conn,$username));
    $email = htmlentities(mysqli_real_escape_string($conn,$email));
    $phone = htmlentities(mysqli_real_escape_string($conn,$phone));

    $first = htmlspecialchars($first);
    $last = htmlspecialchars($last);
    $username = htmlspecialchars(strtolower($username));
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);

    $first = stripcslashes($first);
    $last = stripcslashes($last);
    $username = stripcslashes($username);
    $email = stripcslashes($email);
    $phone = stripcslashes($phone);



    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        $gender = htmlentities(mysqli_real_escape_string($conn,$gender));
        $gender = htmlspecialchars($gender);
        $gender = stripcslashes($gender);

        if(!in_array($gender,['male','female'])){
            $gender_error = '<p id="error">Please choose a gender</p>';
            $error = 1;
        }  
    }

    if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year'])){
        $birthday_day = (int) $_POST['birthday_day'];
        $birthday_month = (int) $_POST['birthday_month'];
        $birthday_year = (int) $_POST['birthday_year'];
        $birthday = $birthday_day.'-'.$birthday_month.'-'.$birthday_year; 
    }
    

    if(empty($first)){
        $first_error = '<p id="error">Please insert your first name.</p>';
        $error = 1;

    }
    if(empty($last)){
        $last_error = '<p id="error">Please insert your last name.</p>';
        $error = 1;

    }
    if(empty($phone)){
        $phone_error = '<p id="error">Please insert your phone number.</p>';
        $error = 1;

    }
    if(empty($birthday)){
        $birthday_error = '<p id="error">Please choose a date of birth.</p>';
        $error = 1;
    }

    if(empty($username)){
        $user_error = '<p id="error">Please insert a username.</p>';
        $error = 1;
    }
    if(empty($gender)){
        $gender_error = '<p id="error">Please choose a gender.</p>';
        $error = 1;

    }
    if(empty($email)){
        $email_error = '<p id="error">Please insert an email.</p>';
        $error = 1; 
        include('forget_password.php');


    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = '<p id="error">Please insert a valid email.</p>';
        $error = 1; 
        include('forget_password.php');      
    }
    else if((isset($email) && (empty($last) || empty($first) || empty($username) || empty($gender) || empty($birthday)))){
        $error = 1;
        include('forget_password.php');
    }
   
    
    
    
    
    if($error == 0){
        $sql = "SELECT * FROM users WHERE first='$first' AND last='$last' AND username='$username' AND email='$email' AND phone='$phone' AND gender='$gender' AND birthday='$birthday'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        if(empty($row)){
            $first_error = '<p id="error">Wrong informations.</p>';
            include('forget_password.php');
            exit();
        }
        else if($row['first']===$first && $row['last']===$last && $row['username']===$username && $row['email']===$email && $row['phone']===$phone && $row['gender']===$gender && $row['birthday']===$birthday){
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header('location:change_password.php');
            exit();
        }
        else{
            $first_error = '<p id="error">Wrong informations.</p>';
            include('forget_password.php');
            exit();
        }

        
        

    }
}