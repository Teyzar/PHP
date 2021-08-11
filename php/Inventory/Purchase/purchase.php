
<?php
    session_cache_limiter('private_no_expire');
    require_once '/Apps/laragon/www/php/database/config.php';
    require_once '/Apps/laragon/www/php/Inventory/auth-check.php';

    $sql = "SELECT product_name, price FROM products";
    
    $query = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "/php/Inventory/styles/purchase.css">
    <title>Purchase</title>
</head>
<div class = "homes"><a href = "../homepage"><font color = "black">Home</font></a></div>
<body>
<div class = "insert">
    <h1><font color = "black"> Purchase product</font> </h1>
    
    <form action = "purchase" method = "POST">
    
        <font color = "black">Product</font>: <select name="items" style = "width: 150px">
            <option value="">Select</option>
            <?php
            $dataprod = array();
                $i = 0;
                if ($query) {
                    while($row = mysqli_fetch_assoc($query)) {
                        $dataprod[$i] = $row['product_name'];
            ?>
                <option><?php echo $dataprod[$i]?></option>
            <?php 
            $i++;
                }
            } else {
                echo "no product";
            }
            ?>
        </select>
        <font color = "black">Quantity</font>: <input type="number" name = "quantity" size = "10">
        <button name = "submit"> add </button>
        
    </form>
        <?php
            if (isset($_POST['submit'])) {
                $item = $_POST['items'];
                $quantity = $_POST['quantity'];
                $select = "SELECT price FROM products WHERE product_name = '$item'";
                $findquery = $conn->query($select);
                $price = mysqli_fetch_assoc($findquery);
                $empty = empty($quantity);

                header("Location: purchase");
                if (!$empty && $price && $item != "Select") {
                    $conn->query("CREATE TABLE purchase ( id INT AUTO_INCREMENT PRIMARY KEY, item VARCHAR(255), quantity INT(11) NOT NULL, itemprice DECIMAL(19 , 2) NOT NULL);");
                    $priceVar = $price['price'];
                    $insert = "INSERT INTO purchase (item, quantity, itemprice) VALUES ('$item', '$quantity', '$priceVar')";
                    $conn->query($insert);

                    

                    } elseif ($empty){
                        echo "<script>alert('Kindly input the quantity field')</script>";
                    }
                }


        ?>
        <div class = "table">
            <table border = "4" width = "400px">
                <tr>
                <th> Item </th>
                <th> Quantity </th>
                <th> Price </th>
                </tr>
            <?php 
                $selectInsert = "SELECT item, quantity, itemprice FROM purchase";

                $datainserted = $conn->query($selectInsert);
                $data_item = array();
                $data_quantity = array();
                $data_price = array();
                if ($datainserted) {
                    $i = 0;
                    while ($row  = mysqli_fetch_assoc($datainserted)) {
                        $data_item[$i] = $row['item'];
                        $data_quantity[$i] = $row['quantity'];
                        $data_price[$i] = $row['itemprice'];
                        $totalprice = 0;
                        
            ?>
                <tr>
                    <td><font color = "maroon">
                        <?php 
                            echo $data_item[$i];
                        ?>
                    </font></td>
                    <td><font color = "maroon">
                        <?php 
                    
                            echo $data_quantity[$i];
                        ?>
                    </td></font>
                    <td><font color = "maroon">
                        <?php 
                            echo $data_price[$i];
                        ?>
                    </font></td>
                </tr>
            <?php 
                $i++;
                    }
                }
            
            ?>
            <table border = "4" width = "400px">
                <br>
                <tr>
                    <td> Total Price </td>
                </tr>
            <?php 
                $totalprice = 0;
                $sum = 0;
                $i = 0;
                while ($i != count($data_price)) {
                $sum = $data_quantity[$i] * $data_price[$i];
                $totalprice += $sum;
                $i++;
                }
            ?>
             <tr>
                <th with = "200px"><font color = "maroon"> <?php echo number_format($totalprice) ?> </font></th>
                </tr>
            <table>

            </div>
        </div>
    </table>
    <br>
    <table border = "2" style="margin-left:125px;">
                <tr>
                    <td>
                        <div>
                            <form method="POST">
                                <input type='submit' name='clearbtn' style="width:150px" value='CLEAR'>
                            </form> 
                        </div>
                    </td> 
                </tr>
    </table>
        <?php
            if (isset($_POST['clearbtn'])) {
                $drop = "DROP TABLE purchase";
                $conn->query($drop);
            }
            $conn->close();
        ?>
</html>
