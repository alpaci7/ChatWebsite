

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <form action="change_password_post.php" method="post">
            <?php if(isset($pass_error)) echo $pass_error; ?>
            <input type="password" name="password1" id="password1" placeholder="New password"><br>
            <input type="password" name="password2" id="password2" placeholder="Retype password"><br>
            <button type="submit" name="submit">Save Password</button>
        </form>
    </div>
    
</body>
</html>