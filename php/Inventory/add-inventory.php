<?php
    require_once '../database/config.php';
    session_start();
    if (isset($_POST['addprod'])) {

        $productname = $_POST['product'];
        $price = $_POST['price'];
        $stocks = $_POST['stocks'];
        $_SESSION["inventory"] = $productname;

        $checkProducts = mysqli_query($conn, "SELECT `product_name` FROM `products` WHERE `product_name` = '".$productname."'") or exit(mysqli_error($conn));
        
        $empty = empty($productname) || empty($price) || empty($stocks);

        if (mysqli_num_rows($checkProducts)) {
            header("Location: inventory?Productalreadyexist=1");
        } elseif ($empty) {
            header("Location: inventory?emptyfields=1");
        }  
        if (!mysqli_num_rows($checkProducts)) {
            $values = "VALUES ('$productname', '$price', '$stocks')";
            $sql = "INSERT INTO products (product_name, price, stocks) $values";

            $query = $conn->query($sql);

            if ($query == true) {
                header("Location: inventory?succesful=1");
            } else {
                echo "Error " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }

    }

?>