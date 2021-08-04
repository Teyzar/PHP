<?php
    include "$_SERVER[DOCUMENT_ROOT]/php/database/config.php";
    session_start();

    if (isset($_SESSION['id'])) {
        header("Location: /php/Inventory/inventory");
    }
     
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
        $_SESSION["mail"] = $email;    
        $_SESSION["pass"] = $password; 

        $empty = empty($email) || empty($password) || empty($confirmpass);
        $equal = $password == $confirmpass;
        $filter = filter_var($email, FILTER_VALIDATE_EMAIL);

        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        $checkEmail = mysqli_query($conn, "SELECT `user_email` FROM `accounts` WHERE `user_email` = '".$email."'") or exit(mysqli_error($conn));
        $checkPass = mysqli_query($conn, "SELECT `user_password` FROM `accounts` WHERE `user_password` = '".$password."'") or exit(mysqli_error($conn));

        $validpass = strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars;

        if(mysqli_num_rows($checkEmail)) {
            header("Location: Register?Emailalreadyexist=1");
        } elseif (mysqli_num_rows($checkPass)) {
            header("Location: Register?Passwordalreadyexist=1");
        }
        if (!$equal){
            header("Location: Register?error=1");
        } elseif ($validpass) {
            header("Location: Register?notvalidpass=1");
        }
        if (!$empty && $equal && $filter == true && !$validpass){
            $accounts->email = $email;
            $accounts->password = $password;

            $hash = md5($accounts->password);

            $values = "VALUES ('$accounts->email', '$hash')";
            $sql = "INSERT INTO accounts (user_email, user_password) $values";
        
            $query = $conn->query($sql);
        
            if ($query === true) {
            
                header("Location: Register?Succesful=1");

            } else {
                echo "Error " . $sql . "<br>" . $conn->error;
            }
            $conn->close();   
        } 
        if ($empty) {
            header("Location: Register?emptyfields=1");
        }  elseif ($filter == false) {
            header("Location: Register?invalidemail=1");
        }
    }
?>
