<?php 
    require_once 'auth-check.php';
    require_once '../database/config.php';
    
    $sql = "SELECT id, product_name, price, stocks FROM products";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "/php/Inventory/styles/style2.css">
    <title>Inventory</title>
</head>
    <div class = "login"><a href = "logout"><font color = "black">Logout</font></a></div>
    <div class = "homepage"><a href = "homepage"><font color = "black">Home</font></a></div>

    <script = "text/javascript">
        function timedMsg()
        {
            var t=setTimeout("document.getElementById('myMsg').style.display='none';",2500);
        }
    </script>
    <?php 
        if (isset($_GET['updateSuccess'])) {
    ?>
        <h2 id = "myMsg"><div class = "update">Update Succesful</div></h2>
        <script language="JavaScript" type="text/javascript">timedMsg() </script>
    <?php } ?>
    
<body>
    
    <div class = "table">
    <table border = "15" width = "800" height = "30">
        <tr>
        <th> No. </th>
        <th> Product name </th>
        <th> Price </th>
        <th> Stocks </th>
        </tr>
    <?php 
        $dataid = array();
        $dataprod = array();
        $dataprice = array();
        $datastocks = array();
        if ($result) {
            $i = 0;
            while ($row  = mysqli_fetch_assoc($result)) {
                $dataid[$i] = $row['id'];
                $dataprod[$i] = $row['product_name'];
                $dataprice[$i] = $row['price'];
                $datastocks[$i] = $row['stocks'];
    ?>
        <tr>
        <td width = "50"> 
            <?php
                $_SESSION['ID'] = $dataid;
                echo $dataid[$i];
            ?></td>
        <td width = "200"> 
            <?php 
                echo $dataprod[$i];
            ?></td>
        <td width = "200"> 
            <?php 
           
                echo $dataprice[$i];
            ?></td>
        <td width = "200"> 
            <?php 
                echo $datastocks[$i];
            ?></td>

        <td width = "50"><a href = "editlist?id=<?php echo $row['id'];?>"><font color = "blue">edit</font></a></div></td>
        <td width = "60"><a href = "delete?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?')"><font color = "red">delete</font></a></div></td>
        </tr>
    <?php 
        $i++;
            }
        } else {
            echo "Empty Inventory List";
        }
        $conn->close();
    ?>
    </div>
    </table> 
</body>
</html>