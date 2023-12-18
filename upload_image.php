<?php 
    include_once('inc/connection.php');
    if(empty($_POST['image'])){
        $image_error = '<p id="error">Please choose a picture</p>';
        include_once('home.php');
    }
    else{
        session_start();
    }
    
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];

        if(isset($_POST['upload_image'])){
            $file = $_FILES['image'];
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $file_error = $_FILES['image']['error'];
            $file_tmp = $_FILES['image']['tmp_name'];

            $file_ext = explode('.',$file_name);
            $file_actual_ext = strtolower(end($file_ext));
            $allowed = array('jpg','jpeg','png','svg');
            if(in_array($file_actual_ext,$allowed)){
                if($file_error === 0){
                    if($file_size < 3000000){
                        $file_new_name = uniqid('',true).'.'.$file_actual_ext;
                        $target = 'images/'.$file_new_name;
                        $sql = "UPDATE users SET picture='$file_new_name' WHERE username='$username' AND id='$id'";
                        mysqli_query($conn,$sql);
                        move_uploaded_file($file_tmp,$target);
                        header('location:home.php');
                    }
                    else{
                        $image_error = '<p id="error">Your picture is big</p>';
                        include_once('home.php');
                    }

                }
                else{
                    $image_error = '<p id="error">Error in upload image</p>';
                    include_once('home.php');
                }
            }
            else{
                $image_error = '<p id="error">You cannot upload files of this type</p>';
                include_once('home.php');
            }

        }







    }