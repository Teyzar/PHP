<?php
    session_cache_limiter('private_no_expire');
    require_once 'auth-check.php';
    require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "/php/Inventory/styles/style.css">
        <title>Home</title>
    </head>
    <div class = "log"><a href = "logout"><font color = "black">Logout</font></a></div>
    <div class = "home"><a href = "homepage"><font color = "black">Home</font></a></div>
    <body>
            <h1 class ="h1"> Welcome <br>Inventory Management </h1>

            <form action="inventory" method = "POST">
                <div class = "button"><button type = "submit" name = "addprod"> ADD INVENTORY</button> </div>
            </form>
            <form action="View" method = "POST">
                <div class = "button"><button type = "submit" name = "view">VIEW INVENTORY</button> </div>
            </form>
            <form action="/php/Inventory/Purchase/purchase" method = "POST">
                <div class = "button"><button type = "submit" name = "purchase"> MAKE PURCHASE</button> </div>
            </form>
        
        
       
    </body>
</html>

