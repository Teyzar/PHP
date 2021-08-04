<?php
    include "$_SERVER[DOCUMENT_ROOT]/php/database/config.php";
    session_start();

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $_SESSION["mail"] = $email;    
        $_SESSION["pass"] = $password;  
        $hashpass = md5($password);

        $true = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email = '".$email."' AND  user_password = '".$hashpass."'");
        $wrongEmail = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email != '".$email."' AND  user_password = '".$hashpass."'");
        $wrongPass = mysqli_query($conn, "SELECT user_email, user_password FROM accounts WHERE user_email = '".$email."' AND  user_password != '".$hashpass."'");

        $empty = empty($email) && empty($password);

        $hash = md5($email);
       
        if (mysqli_num_rows($true)) {
            sleep(1);
            $_SESSION['id'] = true;
            header("Location: /php/Inventory/homepage.php");
            
        } elseif (!mysqli_num_rows($true)) {    
            header("Location: index?error");
          
        } 
        if ($empty) {
            header("Location: index?emptyfields=1");
        }
        elseif (mysqli_num_rows($wrongPass)) {
            header("Location: index?errorpassword");
            
        } elseif (mysqli_num_rows($wrongEmail)) {
            header("Location: index?erroremail");
             
        }
    }
    $conn->close();
    
    
?>

