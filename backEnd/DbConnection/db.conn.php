<?php

$ServerName = "localhost";
$UserName = "root";
$Password = "" ;
$DbName = "photography";

$conn = new mysqli($ServerName , $UserName , $Password , $DbName);

if($conn->connect_error){
    echo "connection Fail";
}


?>