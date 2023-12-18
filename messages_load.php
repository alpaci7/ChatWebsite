<?php
    include('inc/connection.php');
    session_start();
    $host_id = $_SESSION['id'];
    $guest_id = $_SESSION['profile_id'];

    date_default_timezone_set('Africa/Casablanca');
    $today_date = date('m/d/y',time());

    $sql = "SELECT * FROM messages WHERE id=(SELECT max(id) FROM messages)";
    $result = mysqli_query($conn,$sql);
    $last_data = mysqli_fetch_assoc($result);
    $last_id = $last_data['id'];


    for($i=0;$i<=$last_id;$i++){
        $sql = "SELECT * FROM messages WHERE id='$i'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if(empty($data)){
            continue;
        }
        if($data['host'] == $host_id && $data['guest'] == $guest_id){
            $data_message = $data['message'];
            $data_time = $data['time'];
            $date = date('m/d/y', $data_time);
            if($date == $today_date){
                $date = date('h:i:s a',$data_time);
            }
            else{
                $date = date('m/d/y h:i:s a',$data_time);
            }
            echo "<p class ='sender'>$data_message</p>";
            echo "<p class ='sender'>$date</p>";
        }
        if($data['host'] == $guest_id && $data['guest'] == $host_id){
            $data_message = $data['message'];
            $data_time = $data['time'];
            $date = date('m/d/y', $data_time);
            if($date == $today_date){
                $date = date('h:i:s a',$data_time);
            }
            else{
                $date = date('m/d/y h:i:s a',$data_time);
            }
            echo "<p class ='reciever'>$data_message</p>";
            echo "<p class ='reciever'>$date</p>";
        }
    }
   
 
 