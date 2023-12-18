<?php 
    include('inc/connection.php');
    session_start();
    //error_reporting(0);
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        if(isset($_POST['submit'])){
            $id = $_SESSION['id'];
            $last_username = $_SESSION['username'];
            $last_profile_picture = $_SESSION['picture'];
            $last_cv = $_SESSION['cv'];

            $last = $_POST['last'];
            $first = $_POST['first'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            $image_name = $_FILES['picture']['name'];
            $image_type = $_FILES['picture']['type'];
            $image_size = $_FILES['picture']['size'];
            $image_error = $_FILES['picture']['error'];
            $image_tmp = $_FILES['picture']['tmp_name'];

            $cv_name = $_FILES['cv']['name'];
            $cv_type = $_FILES['cv']['type'];
            $cv_size = $_FILES['cv']['size'];
            $cv_error = $_FILES['cv']['error'];
            $cv_tmp = $_FILES['cv']['tmp_name'];

            $first = htmlentities(mysqli_real_escape_string($conn,$first));
            $last = htmlentities(mysqli_real_escape_string($conn,$last));
            $username = htmlentities(mysqli_real_escape_string($conn,$username));
            $password = htmlentities(mysqli_real_escape_string($conn,$password));
            $email = htmlentities(mysqli_real_escape_string($conn,$email)); 
            $gender = htmlentities(mysqli_real_escape_string($conn,$gender)); 
            $phone = htmlentities(mysqli_real_escape_string($conn,$phone)); 

            $first = htmlspecialchars($first);
            $last = htmlspecialchars($last);
            $username = htmlspecialchars(strtolower($username));
            $password = htmlspecialchars($password);
            $email = htmlspecialchars($email);
            $gender = htmlspecialchars($gender);
            $phone = htmlspecialchars($phone);

            $md5_pass = md5($password);
            
            $image_ext = explode('.',$image_name);
            $image_actual_ext = strtolower(end($image_ext));
            $allowed = array('pdf','jpg','jpeg','png','svg');

            $cv_ext = explode('.',$cv_name);
            $cv_actual_ext = strtolower(end($cv_ext));

            if(empty($cv_name)){
                $cv_new_name = $last_cv;
            }
            else{
                if(in_array($cv_actual_ext,$allowed)){
                    if($cv_error === 0){
                        if($cv_size < 3000000){
                            $cv_new_name = uniqid('',true).'.'.$cv_actual_ext;
                            $target_cv = 'files/'.$cv_new_name;
                            
                        }
                        else{
                            $cv_error = '<p id="error">Your file is big.</p>';
                            $error = 1;
                            include_once('edit_profile.php');
                        }
    
                    }
                    else{
                        $cv_error = '<p id="error">Error in upload file.</p>';
                        $error = 1;
                        include_once('edit_profile.php');
                    }
                }
                else{
                    $cv_error ='<p id="error">You cannot upload file of this type.</p>';
                    $error = 1;
                    include_once('edit_profile.php');
                }

            }
            if(empty($image_name)){
                $image_new_name = $last_profile_picture;
            }
            else{
                if(in_array($image_actual_ext,$allowed)){
                    if($image_error === 0){
                        if($cv_size < 3000000){
                            $image_new_name = uniqid('',true).'.'.$image_actual_ext;
                            $target_image = 'images/'.$image_new_name;
                            
                        }
                        else{
                            $image_error = '<p id="error">Your picture is big.</p>';
                            $error = 1;
                            include_once('edit_profile.php');
                        }
    
                    }
                    else{
                        $image_error = '<p id="error">Error in upload image.</p>';
                        $error = 1;
                        include_once('edit_profile.php');
                    }
                }
                else{
                    $image_error ='<p id="error">You cannot upload files of this type.</p>';
                    $error = 1;
                    include_once('edit_profile.php');
                }

            }

            if(isset($_POST['birthday_month']) && isset($_POST['birthday_day']) && isset($_POST['birthday_year'])){
                $birthday_month = (int)$_POST['birthday_month']; 
                $birthday_day = (int)$_POST['birthday_day'];
                $birthday_year = (int)$_POST['birthday_year'];
                $birthday = $birthday_day.'-'.$birthday_month.'-'.$birthday_year;
            }
            if(isset($_POST['gender'])){
                if(!in_array($gender,['male','female'])){
                    $gender_error = '<p id="error">Please choose a gender. </p>';
                    $error = 1;
                }
                
            }

                
            if(empty($first)){
                $first_error = '<p id="error">Please insert a first name.</p>';
                $error = 1;

            }
            if(empty($last)){
                $last_error = '<p id="error">Please insert a last name.</p>';
                $error = 1;

            }
            if(empty($phone)){
                $phone_error = '<p id="error">Please insert a phone number.</p>';
                $error = 1;

            }
            if(empty($email)){
                $email_error = '<p id="error">Please insert an email.</p> ';
                $error = 1;
            }
            else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email_error = '<p id="error">Please insert a valid email.</p> ';
                $error = 1;
            }

            if(empty($username)){
                $user_error = '<p id="error">Please insert a username.</p>';
                $error = 1;

            }
            else if(strlen($username) < 6){
                $user_error = '<p id="error">Your username must have 6 of letters and numbers.</p>';
                $error = 1;
            }
            else if(filter_var($username,FILTER_VALIDATE_INT)){
                $user_error = '<p id="error">Please insert a valid username not a number.</p> ';
                $error = 1;

            }

            if(empty($password)){
                $pass_error = '<p id="error">Please insert a password.</p>';
                $error = 1;
                include('edit_profile.php');

            }
            else if(strlen($password) < 6){
                $pass_error = '<p id="error">Your password must have 6 of letters and numbers.</p>';
                $error = 1;
                include('edit_profile.php');

            }
            else if(empty($first) || empty($last) || empty($username) || empty($email) || empty($gender)|| empty($phone)|| empty($birthday)){
                include('edit_profile.php');
            }
            $check_user = "SELECT * FROM users WHERE username='$username'";
            $check_result = mysqli_query($conn,$check_user);
            $num_rows = mysqli_num_rows($check_result);
            if(($username != $last_username) && ($num_rows != 0)){ 
                $user_error = '<p id="error">Sorry username already exist.</p>';
                $error = 1;
                include('edit_profile.php');

            }

            
            
        
            if($error == 0){
                $sql = "UPDATE users SET first='$first',last='$last',username='$username',password='$password',email='$email',phone='$phone',gender='$gender',birthday='$birthday',md5_pass='$md5_pass',picture='$image_new_name',cv='$cv_new_name' WHERE id='$id'";
                mysqli_query($conn,$sql);
                move_uploaded_file($image_tmp,$target_image);
                move_uploaded_file($cv_tmp,$target_cv);
                header('location:home.php');
            }
        }    
      
    }