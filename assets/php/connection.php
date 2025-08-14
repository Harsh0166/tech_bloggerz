<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "techbloggerz";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo "connection problem";
}

session_start();
?>