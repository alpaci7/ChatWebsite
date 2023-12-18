<?php
session_start();
include('inc/connection.php');
include_once('messages_field.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password'])){
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    

    $sql = "SELECT * FROM users WHERE id='$id' AND username='$username'";
    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $data['id'];
    $_SESSION['first'] = $data['first'];
    $_SESSION['last'] = $data['last'];
    $_SESSION['phone'] = $data['phone'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['birthday'] = $data['birthday'];
    $_SESSION['picture'] = $data['picture'];
    $_SESSION['cv'] = $data['cv'];
    $_SESSION['friends'] = $data['friends'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .online-friend{
            position: relative;
        }
        .online-friend-zindex{
            z-index: -1;
        }

        .online-friend::after{
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            border: 2px solid white;
            border-radius: 50%;
            background: green;
            bottom: 0;
            left: 0;
        }
        .message{
            display: flex;
        }
        .message-info{
            padding: 30px 20px;    
        }
    </style>
    <script src="https://kit.fontawesome.com/fee0429066.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav>
        <div class="nav-left">
            <h1 ><a href="home.php" class="logo">ElectroGates</a></h1>
            <ul>
                <li><i class="fa-solid fa-bell" onclick="notificationToggle()"><span class="notification">3</span></i>
                    <div class="notifications-field">
                        <img class="icon-image"src="images/no_profile_picture_male.jpg">
                    </div>
                </li>
                <li><i class="fa-sharp fa-solid fa-envelope" onclick="messageToggle()"><span class="notification">3</span></i>
                    <div class="messages-field">
                    <?php
                        for($i=0;$i<count($messages);$i++){
                            if($messages[$i][1] == $id){
                                $host = $id;
                                $guest = $messages[$i][2];
                                $query = "SELECT * FROM users WHERE id='$guest'";
                            }
                            else if($messages[$i][2] == $id){
                                $host = $messages[$i][1];
                                $guest = $id;
                                $query = "SELECT * FROM users WHERE id='$host'";
                            }

                            $result = mysqli_query($conn,$query);
                            $data_message = mysqli_fetch_assoc($result);
                    ?>
                    <div class="message">
                        <img class="search-picture" src="images/<?=$data_message['picture'];?>" onclick="window.location.href='messages.php?id=<?=$data['id'];?>'">
                        <div <?php if($data_message['status'] == 'connect'):?>class="online-friend"<?php endif;?>>
                            <?= $data_message['username'];?>
                            <br>
                            <?= $messages[$i][3];?>
                            
                        </div>
                    </div>
                            
                        
                    
                    <?php
                        }
                    ?>
                    
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <form id="form" action="search.php" method="POST">
                    <i onclick="document.getElementById('form').submit();" class="fa-solid fa-magnifying-glass"></i>
                    <input name="search" type="text" placeholder="Search">
                </form>     
            </div>
            <div class="nav-user-icon online" onclick="menuToggle()">
                <img  class="icon-image" src="images/<?php echo $data['picture'];?>">
            </div>

        </div>

        <div class="menu">
            <div id="dark-button">
                <span></span>
            </div>
            <div class="nav-user-icon">
                <img  class="icon-image" src="images/<?php echo $data['picture'];?>">
                <div class="nav-user-info"> 
                    <p><?php echo $username;?></p>
                    <a href="">See your profile</a>
                </div>
            </div>
            <div class="nav-user-edit">
                <i class="fa-solid fa-user-pen"></i>
                <a href="edit_profile.php">Edit profile</a>
            </div>
            <div class="nav-user-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <h1>Friends : </h1>

            <?php

                $friends = json_decode($data['friends']);
                if(empty($friends)){
                    $msg = "<p class='error'>no friend.</p>";
                }
                else{
                    for($i=0;$i<count($friends);$i++){
                        $friend_id = $friends[$i];
                        $query = "SELECT * FROM users WHERE id='$friend_id'";
                        $result = mysqli_query($conn,$query);
                        $data_friends = mysqli_fetch_assoc($result);
                        
                        if(empty($data_friends['username'])){
                            $msg = "<p class='error'>Error.</p>";
                        }
                        else{
                            $friend_username = $data_friends['username'];
                            $friend_status = $data_friends['status'];  
                    
                        
            ?>
        
            <div <?php if($friend_status == 'connect'):?>class="online-friend"<?php endif;?> onclick="window.location.href='profile.php?username=<?php echo $friend_username;?>'">
                <img class="search-picture" src="images/<?php echo $data_friends['picture'];?>" onclick="window.location.href='profile.php?username=<?php echo $friend_username;?>'">
                <?php echo $friend_username;?>
            </div>   
       

<?php 
                        }
                     }
                }
?>
    <?php if(isset($msg)) {echo $msg;}?> 

        </div>
        
        <div class="main-content"></div>
        <div class="sidebar"></div>
    </div>


    <script src="script.js"></script>
</body>
</html>
<?php
}
else{
    header('location:logout.php');
    exit();
}
?>