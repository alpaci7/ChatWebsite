<?php
    session_start();
    include('inc/connection.php');
    $profile_id = $_SESSION['profile_id'];
    $id = $_SESSION['id'];

    $query_host = "SELECT * FROM users WHERE id='$id'"; 
    $result_host = mysqli_query($conn,$query_host);
    $data_host = mysqli_fetch_array($result_host);
    $friends_host = json_decode($data_host['friends']);
    $friends_host[] = $profile_id;
    
    $friends_host = json_encode($friends_host);

    $sql_host = "UPDATE users SET friends='$friends_host' WHERE id='$id'";
    mysqli_query($conn,$sql_host);
    

    $query_guest = "SELECT * FROM users WHERE id='$profile_id'"; 
    $result_guest = mysqli_query($conn,$query_guest);
    $data_guest = mysqli_fetch_array($result_guest);
    $friends_guest = json_decode($data_guest['friends']);
    $friends_guest[] = $id;
    
    $friends_guest = json_encode($friends_guest);

    $sql_guest = "UPDATE users SET friends='$friends_guest' WHERE id='$profile_id'";
    mysqli_query($conn,$sql_guest);
    
    header('location:home.php');
    
    
?>