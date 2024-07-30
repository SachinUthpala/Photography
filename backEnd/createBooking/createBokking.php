<?php 

require_once '../DbConnection/db.conn.php';
session_start();

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = (string) $_POST['date'];
    $shootType = $_POST['shootType'];
    $massage = $_POST['massage'];

    $sql = "INSERT INTO `bookings`( `yourname`, `email`, `date`, `shootType`, `specialRequest`) 
    VALUES ('$name' , '$email' , '$date' , '$shootType' , '$massage')";

    
}



?>