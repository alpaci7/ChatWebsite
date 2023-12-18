<?php
    session_start();
    include('inc/connection.php');
    if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $username = $_SESSION['username']; 

        $info = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND id='$id'");
        while($data = mysqli_fetch_array($info)){
            $_SESSION['id'] = $data['id'];
            $_SESSION['first'] = $data['first'];
            $_SESSION['last'] = $data['last'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['birthday'] = $data['birthday'];
            $_SESSION['cv'] = $data['cv'];
            $_SESSION['friends'] = $data['friends'];
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <button onclick="window.location.href='logout.php'">Log out</button>
    <div class="bar">
        <form action="search.php" method="POST">  
            <input type="text" name="search" class="search_bar" placeholder="Type someone or something">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
    <button onclick="window.location.href='edit_profile.php'">Edit profile</button>
    <div class="main">
        <div class="photo">
            <?php echo "<img id='photo' src='images/".$data['profile_picture']."' alt='Image not found'>"; ?>
        </div>

        <?php if(isset($image_error)) echo $image_error ;?>
        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <button type="submit" name="upload_image">Upload image</button>
        </form>

        <h1>Welcome <?php echo $data['first'].' '.$data['last'];?></h1>
        <h2>Username :<?php echo $data['username'];?></h2>
        <h2>Email : <?php echo $data['email'];?> </h2>
        <h2>Password : <?php echo $data['password'];?> </h2>
        <h2>Phone number : <?php echo $data['phone'];?> </h2>
        <h2>Gender : <?php echo $data['gender'];?> </h2>
        <h2>Birthday : <?php echo $data['birthday'];?> </h2>

        <?php if(isset($cv_error)) echo $cv_error ;?>
        <form action="upload_cv.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="cv" id="cv">
            <button type="submit" name="upload_cv">Upload cv</button><br>
            <embed src="files/<?php echo $data['cv'];?>" width="900px" height="1200px" /><br>
        </form>

    </div>

    <h1>Friends : </h1>

<?php

            $friends = json_decode($data['friends']);
            if(empty($friends)){
                $msg = "<p id='error'>no friend.</p>";
            }
            else{
                for($i=0;$i<count($friends);$i++){
                    $friend_id = $friends[$i];
                    $query = "SELECT * FROM users WHERE id='$friend_id'";
                    $result = mysqli_query($conn,$query);
                    $data_friends = mysqli_fetch_assoc($result);
                    
                    if(empty($data_friends['username'])){
                        $msg = "<p id='error'>Error.</p>";
                    }
                    else{
                        $friend_username = $data_friends['username'];
                        $friend_status = $data_friends['status'];  
               
?>
    <div>
        <img class="search_picture" src="images/<?php echo $data_friends['profile_picture'];?>" onclick="window.location.href='profile.php?username=<?php echo $friend_username;?>'">
        <?php if($friend_status == 'connect'){echo '<div class="status">   </div>';}?>
        <?php echo $friend_username;?>
        
    </div>


<?php
                    }
                }
            }
?>
    <?php if(isset($msg)) {echo $msg;}?>

</body>
</html>  
<?php       
        }
        
    }
    else{
        header('location:logout.php');
        exit();
    }    
?>
