<?php
    require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "style.css">
    <title>Home</title>
</head>
    <div class = "h1" > <h1>Login page  </h1> <div>
<body>
    <form action="login.php" method = "POST">
    <input type = "text" name = "email" placeholder = "email" > 
    <input type = "password" name = "password" placeholder = "password">
    <?php 
    if (isset($_GET['error']) == true) {
        echo '<font color = "#FF0000"><p align = "top">Invalid credentials</p></font>';
    }
    if (isset($_GET['erroremail']) == true) {
        echo '<font color = "#FF0000"><p align = "top">Invalid Email</p></font>';
    }
    if (isset($_GET['errorpassword']) == true) {
        echo '<font color = "#FF0000"><p align = "top">Invalid Password</p></font>';
    }
    ?>
    <button type = "submit" name = "submit"> LOGIN </button>
    </form>

    <div class = "reg">
        
    <a href = "Register.php"><font color = "#e08282"><font size = 4">No account? Register here now!</font></font></a>
    
    </div>


    
</body>
</html>