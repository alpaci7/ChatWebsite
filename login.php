<?php
    session_start();
    include('inc/connection.php');
    if(isset($_POST['username']) && isset($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = str_replace(' ','',$username);
        $username = stripcslashes(strtolower($username));
        $password = stripcslashes($password);

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $username = htmlentities(mysqli_real_escape_string($conn,$username));
        $password = htmlentities(mysqli_real_escape_string($conn,$password));
        $md5_pass = md5($password);

        if(isset($_POST['keep'])){
            $keep = htmlentities(mysqli_real_escape_string($conn,$_POST['keep']));
            if($keep == 1){
                setcookie('username',$username,time()+3600,"/");
                setcookie('password',$password,time()+3600,"/");

            }
        }

        if(empty($username)){
            $user_error = '<p id="error">Please insert a username</p>';
            $error = 1;
        }
        if(empty($password)){
            $pass_error = '<p id="error">Please insert a password</p>';
            include_once('index.php');
            $error = 1;
        }
        if(!isset($error)){
            $sql = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password' AND md5_pass='$md5_pass' LIMIT 1";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $num_rows = mysqli_num_rows($result);
            if($num_rows != 0){
                if(($row['username'] === $username || $row['email'] === $username) && $row['password'] === $password){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $id = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['birthday'] = $row['birthday'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['profile_picture'] = $row['profile_picture'];
                    $sql = "UPDATE users SET status='connect' WHERE id='$id'";
                    mysqli_query($conn,$sql);
                    header('location:home.php');
                    exit();
                }
                else{
                    $user_error = '<p id="error">Wrong username or password</p>';
                    include_once('index.php');
                    exit();
                }
            }
            else{
                $user_error = '<p id="error">Wrong username or password</p>';
                include_once('index.php');
                exit();
            }

          
            
        }
        
    }
   
