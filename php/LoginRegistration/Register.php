
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title>Register account</title>
    </head>
    
    <body>
        
        <div class = "regpage">
            <h1> Create an Account </h1>

        <form action="create_account" method = "POST">
            <input type = "text" name = "RegEmail" placeholder = "email" value = <?php
            if (isset($_GET['Emailalreadyexist'])) {
                echo $_SESSION['mail'];
            } elseif (isset($_GET['Passwordalreadyexist'])) {
                echo $_SESSION['mail'];
            } elseif (isset($_GET['invalidemail'])) {
                echo $_SESSION['mail'];
            } elseif (isset($_GET['notvalidpass'])) {
                echo $_SESSION['mail'];
            } elseif (isset($_GET['error'])) {
                echo $_SESSION['mail'];
            }
            ?> > 
            <input type = "password" name = "Regpassword" placeholder = "password" value = <?php
            if (isset($_GET['Emailalreadyexist'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['Passwordalreadyexist'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['invalidemail'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['notvalidpass'])) {
                echo $_SESSION['pass'];
            }
            ?> >
            <input type = "password" name = "Confirmpass" placeholder = "confirm password" value = <?php
            if (isset($_GET['Emailalreadyexist'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['Passwordalreadyexist'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['invalidemail'])) {
                echo $_SESSION['pass'];
            } elseif (isset($_GET['notvalidpass'])) {
                echo $_SESSION['pass'];
            }
            ?> >
            
            <div class = "but"><button type = "submit" name = "signup">Sign-up</button><div>
        </form>
        <?php
        function function_alert($message){
            echo "<script>alert('$message')</script>";
        }
        function function_alert2($message){
            echo "<script>alert('$message')</script>";
        }
        if (isset($_GET['Emailalreadyexist']) == true) {
            sleep(1);
            echo '<font color = "#FF0000"><p align = "top">Email already exist!</p></font>';
        } elseif (isset($_GET['Passwordalreadyexist']) == true) {
            sleep(1);
            echo '<font color = "#FF0000"><p align = "top">Password already in use!</p></font>';
        } elseif (isset($_GET['invalidemail']) == true) {
            sleep(1);
            echo '<font color = "#FF0000"><p align = "top">Not a valid email!</p></font>';
        } elseif (isset($_GET['notvalidpass']) == true) {
            sleep(1);
            function_alert("Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.");
        }
        if (isset($_GET['error']) == true) {
            sleep(1);
            echo '<font color = "#FF0000"><p align = "top">Sorry, Password did not match</p></font>';     
        } elseif (isset($_GET['emptyfields']) == true) {
            function_alert('You have entered empty fields!');
        } elseif (isset($_GET['Succesful']) == true) {
            sleep(1);
            function_alert2('New Account Created Succesfully!');
            echo '<div class = "reg"> <a href = "index">Login now!</a></div>';
        }
        ?>
        </div>
    </body>
</html>

