
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

        <form action="create_account.php" method = "POST">
            <input type = "text" name = "RegEmail" placeholder = "email" > 
            <input type = "password" name = "Regpassword" placeholder = "password">
            <input type = "password" name = "Confirmpass" placeholder = "confirm password">
            
            <div class = "but"><button type = "submit" name = "signup">Sign-up</button><div>
        </form>
        <?php
        if (isset($_GET['Emailalreadyexist']) == true) {
            echo '<font color = "#FF0000"><p align = "top">Email already exist!</p></font>';
        } elseif (isset($_GET['Passwordalreadyexist']) == true) {
            echo '<font color = "#FF0000"><p align = "top">Password already in use!</p></font>';
        } elseif (isset($_GET['invalidemail']) == true) {
            echo '<font color = "#FF0000"><p align = "top">Not a valid email!</p></font>';
        }
        if (isset($_GET['error']) == true) {
            echo '<font color = "#FF0000"><p align = "top">Sorry, Password did not match</p></font>';
        } elseif (isset($_GET['emptyfields']) == true) {
            echo '<font color = "#FF0000"><p align = "top">You have entered empty fields!</p></font>';
        } elseif (isset($_GET['Succesful']) == true) {
            echo '<font color = "#black"><p align = "top">New Record Created Succesfully!</p></font>';
            echo '<div class = "reg"> <a href = "index.php">Login now!</a></div>';
        }
        ?>
        </div>
    </body>
</html>

