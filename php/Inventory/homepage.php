
<?php
    require_once 'auth-check.php';
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
    <?php ?>
    <div class = "log"><a href = "logout"><font color = "black">Logout</font></a></div>
    <body>
            <h1> Welcome </h1>
            <h1> Inventory Management </h1>

            <form action="inventory" method = "POST">
                <div class = "button"><button type = "submit" name = "addprod"> ADD INVENTORY</button> </div>
            </form>
            <form action="index" method = "POST">
                <div class = "button"><button type = "submit" name = "addprod"> VIEW INVENTORY</button> </div>
            </form>
            <form action="inventory" method = "POST">
                <div class = "button"><button type = "submit" name = "addprod"> MAKE PURCHASE</button> </div>
            </form>
        
        
       
    </body>
</html>
