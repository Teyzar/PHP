<?php
    require_once '../database/config.php';
    session_start();
    if (isset($_SESSION['id'])) {
        header("Location: /php/Inventory/inventory");
    }
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

    <form action="login" method = "POST">

    <input type = "text" name = "email" placeholder = "email" value = <?php
    if (isset($_GET['error'])) {
        echo $_SESSION['mail'];
    } elseif (isset($_GET['errorpassword'])) {
        echo $_SESSION['mail'];
    } elseif (isset($_GET['erroremail'])) {
        echo $_SESSION['mail'];
    }
    ?> > 
    <input type = "password" name = "password" placeholder = "password" value = <?php
    if (isset($_GET['error'])) {
        echo $_SESSION['pass'];
    } elseif (isset($_GET['errorpassword'])) {
        echo $_SESSION['pass'];
    } elseif (isset($_GET['erroremail'])) {
        echo $_SESSION['pass'];
    }
    ?> >
    <?php 
    function function_alert($message){
        echo "<script>alert('$message')</script>";
    }
    if (isset($_GET['emptyfields']) == true) {
        function_alert('You have entered empty fields!');
    }
    if (isset($_GET['error']) == true) {
        sleep(1);
        echo '<font color = "#FF0000"><p align = "top">Invalid credentials</p></font>';
    }
    if (isset($_GET['erroremail']) == true) {
        sleep(1);
        echo '<font color = "#FF0000"><p align = "top">Invalid Email</p></font>';
    }
    if (isset($_GET['errorpassword']) == true) {
        sleep(1);
        echo '<font color = "#FF0000"><p align = "top">Invalid Password</p></font>';
    }
    ?>
    <button type = "submit" name = "submit"> LOGIN </button>
    </form>

    <div class = "reg">
        
    <a href = "Register"><font color = "#e08282"><font size = 4">No account? Register here now!</font></font></a>
    </div>
</body>
</html>