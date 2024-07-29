<?php

require_once '../DbConnection/db.conn.php';
session_start();

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $Password = $_POST['password'];

    $sql_emailCheck = "SELECT * FROM `users` WHERE email = '$email' ";
    $result_emailCheck = $conn->query($sql_emailCheck);

    if($result_emailCheck->num_rows > 0){

        $row = $result_emailCheck->fetch_ASSOC();

        if($Password == $row['password']){
            $_SESSION['name'] = $row['name'] ;
            $_SESSION['email'] = $row['email'];
            $_SESSION['admin'] = $row['admin'] ;
            $_SESSION['user_img'] = $row['img'] ;
            $_SESSION["loginSuccess"] = 1;
            header("Location: ../../index.php");
             echo "login sucess";

        }else{
            echo "Wrong password";
            $_SESSION["SignUpError"] = 1;
            header("Location: ../../index.php");
            
        }        

    }else{
        echo "wrong email";
        $_SESSION["SignUpError"] = 1;
        header("Location: ../../index.php");
        
    }

}else if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $Password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `users`( `name`, `email`, `password`, `phone`) 
    VALUES ('$username' , '$email' , '$Password' , '$phone')";

    if($conn->query($sql)){
        $_SESSION['name'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = 0;
        $_SESSION['Register_Sucessfull'] = 1;
        header("Location: ../../index.php");
        echo "Register sucessfull";
    }else{
        $_SESSION['Register_Unsusessfull'] = 1;
        header("Location: ../../index.php");
        echo "Register unsucessfull";
    }
}




?>