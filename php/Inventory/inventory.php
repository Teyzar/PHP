
<?php
    require_once 'auth-check.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "/php/Inventory/styles/style.css"/>
        <title>Home</title>
    </head>
    <div class = "home"><a href = "homepage"><font color = "black">Home</font></a></div>
    <div class = "log"><a href = "logout"><font color = "black">Logout</font></a></div>
    <body>
            
            <form action="add-inventory" method = "POST">
            <div class = "check">
                <script = "text/javascript">
                    function timedMsg()
                    {
                    var t=setTimeout("document.getElementById('myMsg').style.display='none';",3000);
                    }
                </script>
                <?php 
                    if (isset($_GET['succesful'])) {      
                ?>
                    <h2 id = "myMsg"><div class = "succesful"><?php echo $_SESSION["inventory"]?> has been added</div></h2>
                    <script language="JavaScript" type="text/javascript">timedMsg()</script>
                <?php } elseif (isset($_GET['Productalreadyexist'])) { ?>
                    <h2 id = "myMsg"><div class = "succesful"><font color = "red"><?php echo $_SESSION["inventory"]?> already exist!</font></div></h2>
                    <script language="JavaScript" type="text/javascript">timedMsg()</script>
                <?php 
                
                    } elseif (isset($_GET['emptyfields'])) {
                        function function_alert($message){
                            echo "<script>alert('$message')</script>";
                        }
                        function_alert('You have entered empty fields!');
                    }
                ?>
                <table border = "5">
                <h2><font color = "darkgoldenrod">ADD PRODUCT TO INVENTORY</font></h2>
                <tr>
                <th> Product name </th>
                <th> Price </th>
                <th> Stocks </th>
                </tr>
                <tr>
                <td> <input type = "text" name = "product"></td>
                <td> <input type = "number" name = "price" size = "8"></td>
                <td> <input type = "number" name = "stocks" size = "5"></td>
                </tr>
                </table>
                <div class = "button2"><button type = "submit" name = "addprod"> ADD PRODUCT</button></div>
            </div>
            </form>
    </body>
</html>

