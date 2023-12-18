<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .message{
            display: flex;
        }
        .message-info{
            padding: 30px 20px;
            
            
        }
    </style>
</head>
<body>
<?php    
    session_start();
    include('inc/connection.php');
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM messages WHERE id=(SELECT max(id) FROM messages)";
    $result = mysqli_query($conn,$sql);
    $last_data = mysqli_fetch_assoc($result);
    $length = $last_data['id'];
    $succes = 0;
    
    for($i=1;$i<=$length;$i++){
        $query = "SELECT * FROM messages WHERE id='$i'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        if(empty($data)){
            $error = 1;
        }
        if($data['host'] == $id){
            if(empty($messages)){
                $messages[] = array($data['id'],$data['host'],$data['guest'],$data['message']);
            }
            else{
                $length1 = count($messages);
                $guest = $data['guest'];
                for($j=0;$j<=$length1;$j++){
                    if($messages[$j][1]==$id && $messages[$j][2]==$guest || $messages[$j][1]==$guest && $messages[$j][2]==$id ){
                        $messages[$j] = array($data['id'],$data['host'],$data['guest'],$data['message']);
                        $succes = 1;
                        $j = $length1;
                    }  
                    
                    
                }
                if($succes == 0){
                    $messages[] = array($data['id'],$data['host'],$data['guest'],$data['message']);
                }
               

            }
        }
        $succes = 0;
        if($data['guest'] == $id){
            if(empty($messages)){
                $messages[] = array($data['id'],$data['host'],$data['guest'],$data['message']);
            }
            else{
                $length2 = count($messages);
                $host = $data['host'];
                for($k=0;$k<=$length2;$k++){
                    if($messages[$k][1]==$host && $messages[$k][2]==$id || $messages[$k][1]==$id && $messages[$k][2]==$host ){
                        $messages[$k] = array($data['id'],$data['host'],$data['guest'],$data['message']);
                        $succes = 1;
                        $k = $length2;
                    }                
                    
                }
                if($succes == 0){
                    $messages[] = array($data['id'],$data['host'],$data['guest'],$data['message']);
                }
            }
        }
    }
    for($i=0;$i<count($messages);$i++){
        if($messages[$i][1] == $id){
            $host = $id;
            $guest = $messages[$i][2];
            $sql = "SELECT * FROM users WHERE id='$guest'";
        }
        else if($messages[$i][2] == $id){
            $host = $messages[$i][1];
            $guest = $id;
            $sql = "SELECT * FROM users WHERE id='$host'";
        }

        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
?>
        <div class="message">
            <img class="search-picture" src="images/<?=$data['picture'];?>" onclick="window.location.href='messages.php?id=<?=$data['id'];?>'">
            <div class="message-info">
                <?= $data['username'];?>
                <br>
                <?= $messages[$i][3];?>
            </div>
        </div>
            
        
    
<?php
    }
?>
    
</body>
</html>