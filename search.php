<?php
    session_start();
    include('inc/connection.php');
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/fee0429066.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav>
        <div class="nav-left">
            <h1 ><a href="home.php" class="logo">ElectroGates</a></h1>
            <ul>
                <li><i class="fa-solid fa-bell" onclick="window.location.href='#'"></i></li>
                <li><i class="fa-sharp fa-solid fa-envelope" onclick="window.location.href='messages_field.php'"></i></li>
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
                <img class="icon-image" src="images/<?php echo $data['picture'];?>">
            </div>

        </div>

        <div class="menu">
            <div id="dark-button">
                <span></span>
            </div>
            <div class="nav-user-icon">
                <img class="icon-image" src="images/<?php echo $data['picture'];?>">
                <div class="nav-user-info"> 
                    <p><?php echo $data['username'];?></p>
                    <a href="#">See your profile</a>
                </div>
            </div>
            <div class="nav-user-edit">
                <i class="fa-solid fa-user-pen"></i>
                <a href="#">Edit profile</a>
            </div>
            <div class="nav-user-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    
<?php
        $id = $_SESSION['id'];
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        else{
            $search = '';
        }
        $search = str_replace(' ','',$search);
        $search = htmlentities(mysqli_real_escape_string($conn,$search));
        $search = htmlspecialchars(strtolower($search));
        if(empty($search)){
            $msg = '<p class="error">Please type someone or something.</p>';
        }
        else{
            $sql = "SELECT * FROM users WHERE id=(SELECT max(id) FROM users)";
            $result = mysqli_query($conn,$sql);
            $last_data = mysqli_fetch_assoc($result);
            $last_id = $last_data['id'];
            for($i=1;$i<=$last_id;$i++){
                $sql = "SELECT * FROM users WHERE id='$i'";
                $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_array($result);
                if(empty($data)){
                    continue;
                }
                if($data['id'] == $id){
                    continue;
                }
                if(str_contains($data['first'],$search) || str_contains($data['last'],$search) || str_contains($data['username'],$search) || str_contains($data['email'],$search) || $data['gender']==$search || str_contains($data['phone'],$search)){
            


?>

  
    <div  onclick="window.location.href='profile.php?username=<?php echo $data['username'];?>'" <?php if($data['status'] == 'connect'):?>class="online-friend"<?php endif;?>>
        <img onclick="window.location.href='profile.php?username=<?php echo $data['username'];?>'" class="search-picture" src="images/<?php echo $data['picture'];?>">
        <?php echo $data['username'];?>
    </div>    

<?php
               
                }
                else if(!str_contains($data['first'],$search) && !str_contains($data['last'],$search) && !str_contains($data['username'],$search) && !str_contains($data['email'],$search) && $data['gender']!=$search && !str_contains($data['phone'],$search)){                
                    $msg = '<p class="error"> No other profile found.</p>';
                }
            } 
        }  
?>
    <div>
        <?php if(isset($msg)) echo $msg;?>
    </div>

    <script src="script.js"></script>
</body>
</html>