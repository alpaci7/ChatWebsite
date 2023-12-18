

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h1>Log In</h1><br>
        <form action="login.php" method="POST">
            <?php if(isset($user_error)){ echo $user_error;}?>
            <input type="text" name="username" placeholder="username or email" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>"><br>
            <?php if(isset($pass_error)){ echo $pass_error;}?>
            <input type="password" name="password" placeholder="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"><br>        
            <label><input type="checkbox" name="keep" id="keep" value="1">Keep me signed in</label><br>
            <button name="submit">Log In</button><br>
            <a href="forget_password.php">Forgotten password</a>
        </form>
        <h5>Or</h5>
        <button onclick="window.location.href='register.php'">Register</a>

    </div>
</body>
</html>