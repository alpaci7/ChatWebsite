<?php
include('inc/connection.php');
session_start();
$host_id = $_SESSION['id'];
$guest_id = $_SESSION['profile_id'];
if(isset($_POST['submit'])){
    if(isset($_POST['message'])){
        $message = $_POST['message'];
        $message = htmlspecialchars($message);
        $message =  stripslashes($message);
        $message = htmlentities(mysqli_real_escape_string($conn,$message));

    }
    else{
        $message = "";
    }
    $time = time();
    $sql = "INSERT INTO messages(host,guest,time,message) 
            VALUE ('$host_id','$guest_id','$time','$message')";
    mysqli_query($conn,$sql);
    
    include_once('messages.php');

}