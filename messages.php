<?php
    include('inc/connection.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    $id = $_SESSION['id'];
    if(isset($_SESSION['profile_id'])){
        $guest_id = $_SESSION['profile_id'];
    }
    else if($_SESSION['profile_id'] !== $_GET['id']){
        $guest_id = $_GET['id'];

    }
    $_SESSION['profile_id'] = $guest_id;

    $sql = "SELECT * FROM users WHERE id='$guest_id'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style>
        .search_bar{
            height: 30px;
            width: 400px;
            background-color: rgb(245,245,245);

        }
        .sender{
            text-align : right;
        }
        .reciever{
            text-align: left;
        }
        .chat{
            width: 400px;
            height: auto;
            text-align: center;
            padding: 10px;
        }
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
    <div class="chat">
        <img class="search_picture" onclick="window.location.href='profile.php?username=<?php echo $data['username'];?>'" src="images/<?= $data['picture'] ;?>">
        <?php if($data['status'] == 'connect'){echo '<div class="status">   </div>';}?>
        <?php echo $data['username'];?>
    <section id="messages">

    </section>
        <form action="messages_post.php" method="POST">
            <input type="text" name="message" class="search_bar" placeholder="Type a message to send">
            <button type="submit" name="submit">Send</button>
        </form>
        
        
    </div>
    
    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('messages_load.php');
        }
    </script>
</body>
</html>


