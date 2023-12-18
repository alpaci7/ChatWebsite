<?php   
    session_start();
    include('inc/connection.php');
    $id = $_SESSION['id'];
    $sql = "UPDATE users SET status='disconnect' WHERE id='$id'";
    mysqli_query($conn,$sql);
    session_unset();
    session_destroy();
    header('location:index.php');