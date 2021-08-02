<?php
    include "$_SERVER[DOCUMENT_ROOT]/php/database/config.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $true = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email = '".$email."' AND  user_password = '".$password."'");
    $wrongEmail = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email != '".$email."' AND  user_password = '".$password."'");
    $wrongPass = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email = '".$email."' AND  user_password != '".$password."'");

    if (isset($_POST['submit'])) {
        if (mysqli_num_rows($true) > 0) {
            header("Location: successlogin.php");
        } elseif (!mysqli_num_rows($true)) {
            header("Location: index.php?error=1");
        }
        if (mysqli_num_rows($wrongPass)) {
            header("Location: index.php?errorpassword=1");
        } elseif (mysqli_num_rows($wrongEmail)) {
            header("Location: index.php?erroremail=1");
        }
    }
    $conn->close();
    
?>

