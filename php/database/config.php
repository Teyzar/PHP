<?php

    $server = "localhost";
    $username = "root";
    $pass = "";
    $database = "test";


    $conn = mysqli_connect($server, $username, $pass, $database);

    if (!$conn){
        die("Failed to connect server");
    } else {
        // echo "Connectecd to MySQL Data base! \r\n";
    }

?>