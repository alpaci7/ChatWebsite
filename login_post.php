<?php
    session_start();
    include('inc/connection.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = stripcslashes(strtolower($username));
        $password = stripcslashes($password);

        $username = htmlentities(mysqli_real_escape_string($conn,$username));
        $password = htmlentities(mysqli_real_escape_string($conn,$password));
        
        //$username = filter_input(INPUT_POST,$username);

        $md5_pass = md5($password);

        if(empty($username)){
            $user_error = '<p id="error">Please insert a username. </p>';
            $error = 1;
        }
        if(empty($password)){
            $pass_error = '<p id="error">Please insert a password. </p>';
            $error = 1;
            include('index.php');
        }
    }
    if(!isset($error)){
        $sql = "SELECT id,username,password FROM users WHERE username='$username' AND md5_pass='$md5_pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $username && $row['password'] === $password){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header('location:home.php');
            exit();
        }
        else{
            $user_error = '<p id="error">Wrong username or password</p>';
            include('index.php');
            exit();
        }
    }