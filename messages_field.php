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

    
