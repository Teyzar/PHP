<?php
    require_once '../database/config.php';
    require_once 'auth-check.php';

    $idd = $_GET['id'];

    $checkdata = "SELECT COUNT(*) FROM products WHERE id = (SELECT id FROM products LIMIT 1)";

    $increment = "UPDATE products set id = id-1 WHERE id > '$idd'";

    $sql = "DELETE FROM products WHERE id='$idd'"; 

    $autoincrement = "ALTER TABLE products AUTO_INCREMENT=0";


    $delete = $conn->query($sql);

    $check = $conn->query($checkdata);


    if ($delete || $check) {

        $conn->query($autoincrement);
    
        $conn->query($increment);
        sleep(1);
        header("Location: View");
        exit; 
    } else {
        echo "false";
    }
    $conn->close();
?>