<?php 
    $conn = mysqli_connect('localhost','root','root','website');
    if(!$conn){
        die('Error'.mysqli_connect_error());
    }
