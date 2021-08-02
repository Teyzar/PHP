<?php
    
    include "$_SERVER[DOCUMENT_ROOT]/php/database/config.php";
    class Accounts {
         public $id;
         public $email;
         public $password;
    }
    $accounts = new Accounts();

    if (isset($_POST['signup'])){
        $email = $_POST['RegEmail'];
        $password = $_POST['Regpassword'];
        $confirmpass = $_POST['Confirmpass'];

        $empty = empty($email) || empty($password) || empty($confirmpass);
        $equal = $password == $confirmpass;
        $filter = filter_var($email, FILTER_VALIDATE_EMAIL);

        $checkEmail = mysqli_query($conn, "SELECT `user_email` FROM `accounts` WHERE `user_email` = '".$email."'") or exit(mysqli_error($conn));
        $checkPass = mysqli_query($conn, "SELECT `user_password` FROM `accounts` WHERE `user_password` = '".$password."'") or exit(mysqli_error($conn));
        if(mysqli_num_rows($checkEmail)) {
            header("Location: Register.php?Emailalreadyexist=1");
        } elseif (mysqli_num_rows($checkPass)) {
            header("Location: Register.php?Passwordalreadyexist=1");
        }
        if (!$equal){
            header("Location: Register.php?error=1");
        } elseif ($empty) {
            header("Location: Register.php?emptyfields=1");
        }  
        if (!$empty && $equal && $filter == true){
            $accounts->email = $email;
            $accounts->password = $password;

            $values = "VALUES ('$accounts->email', '$accounts->password')";
            $sql = "INSERT INTO accounts (user_email, user_password) $values";
        
            $query = $conn->query($sql);
        
            if ($query === true) {
            
                header("Location: Register.php?Succesful=1");

            } else {
                echo "Error " . $sql . "<br>" . $conn->error;
            }
            $conn->close();   
        } elseif ($filter == false) {
            header("Location: Register.php?invalidemail=1");
        }
    }
?>
