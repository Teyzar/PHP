<?php

    header("Content-Type:application/json");
    include '../config.php';

    $sql = "SELECT user_id, user_email, user_password FROM accounts";

    $result = $conn->query($sql);
    if ($result) {
        $i = 0;
        while($row  = mysqli_fetch_assoc($result)) {
            $response[$i]['user_id'] = $row['user_id'];
            $response [$i]['user_email'] = $row['user_email'];
            $response [$i]['user_password'] = $row['user_password'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();

?>

