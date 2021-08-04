
<?php
    // require_once 'auth-check.php';
    require_once '../database/config.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <title>Inventory</title>
    </head>
    <?php ?>
    <body>
            <div class = "add">
            <h2> ADD PRODUCT </h2>

            <form action="inventory" method = "POST">
                Product name: <input type = "text" name = "product">
                Quantity : <input type = "text" name = "quantity" size = "1">
                <div class = "button"><button type = "submit" name = "addprod"> ADD PRODUCT</button> </div>
            </form>
            </div>

        
       
    </body>
</html>

