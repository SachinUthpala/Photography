<?php

require_once '../DbConnection/db.conn.php';


if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $Password = $_POST['password'];

    $sql_emailCheck = "SELECT * FROM `users` WHERE email = '$email' ";
    $result_emailCheck = $conn->query($sql_emailCheck);

    if($result_emailCheck->num_rows > 0){

        $row = $result_emailCheck->fetch_ASSOC();

        if($Password == $row['password']){

            $_SESSION["loginSuccess"] = 1;
            header("Location: ../../index.html"); 

        }else{
            $_SESSION["SignUpError"] = 1;
            header("Location: ../../Login/login.html"); 
        }


        $_SESSION["SignUpError"] = 1;
        header("Location: ../../index.html"); 

    }else{
        $_SESSION["SignUpError"] = 1;
        header("Location: ../../index.html"); 
    }

}else if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $Password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    
}




?>