<?php 
    session_start();
    include('inc/connection.php');
    $username = $_GET['username'];
    $friends = json_decode($_SESSION['friends']);
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
    $id = $data['id'];
    $msg = 0;
    if(empty($friends)){
        
    }
    else{
        for($i=0;$i<=count($friends);$i++){
            if(empty($friends[$i])){
                $msg = 0;
            }
            else if($friends[$i] == $id){
                $msg = 1;
                $i = count($friends);
            }
            else{
                $msg = 0;
            }
        }
    }
    $_SESSION['profile_id'] = $id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['username'];?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .status{
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
            display: inline-flex;
        }
    </style>
</head>
<body>
    <div class="main">
        <img id="photo" src="images/<?php echo $data['picture'];?>">
        <?php if($data['status'] == 'connect'){echo '<div class="status">   </div>';}?>
        <?php if($msg==1){
            echo "<button onclick='window.location.href=`messages.php`'>Message</button>";
        }
        else{
            echo "<button onclick='window.location.href=`friends.php`'>Add friend</button>";
        }
        ?>

        <h1><?php echo $data['first'].' '.$data['last'];?></h1><br>
        <h2>Username :<?php echo $data['username'];?></h2><br>
        <h2>Email : <?php echo $data['email'];?></h2><br>
        <h2>Phone number : <?php echo $data['phone'];?></h2><br>
        <h2>Gender : <?php echo $data['gender'];?></h2><br>
        <h2>Birthday : <?php echo $data['birthday'];?></h2>
        <embed src="files/<?php echo $data['cv'];?>">
    </div>
    
</body>
</html>
