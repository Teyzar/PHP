<?php
    session_cache_limiter('private_no_expire');
    require_once '../database/config.php';
    require_once 'auth-check.php';

    $id = $_GET['id'];

    $qry = "SELECT product_name, price, stocks FROM products where id='$id'";

    $fetchdata = mysqli_query($conn,$qry);

    $data = mysqli_fetch_assoc($fetchdata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "/php/Inventory/styles/style.css">
    <title>Edit Inventory</title>
</head>
    <div class = "log"><a href = "logout"><font color = "black">Logout</font></a></div>
    <div class = "home"><a href = "homepage"><font color = "black">Home</font></a></div>
<body>
    <form method= "POST">
        Product: <input type = "text" name = "editproduct" value = <?php 
            $encode = $data['product_name'];
            echo json_encode($encode);
        ?> > 
        Price  : <input type = "text" name = "editprice" value = <?php 
            echo $data['price'];
        ?> > 
        Stocks : <input type = "text" name = "editstocks" value = <?php 
            echo $data['stocks'];
        ?> > 
        <button type = "submit" name = "edit"> submit </button>
    </form>

    <?php 

        if (isset($_POST['edit'])) {
            $productname = $_POST['editproduct'];
            $price = $_POST['editprice'];
            $stocks = $_POST['editstocks'];

            $updateqry = "UPDATE products SET product_name = '$productname', price = '$price', stocks = '$stocks' 
            WHERE id = '$id'";

            $result = $conn->query($updateqry);

            if ($result) {
                sleep(1);
                header("Location: View?updateSuccess");
                $conn->close();
                exit;
            } else {
               echo $conn->error();
            }
        }
    ?>

</body>
</html>