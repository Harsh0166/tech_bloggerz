<?php
include_once("../connection.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $register_sql ="INSERT INTO `registration`(`sno`, `username`, `email`, `password`) VALUES (NULL,'$name','$email','$password')";
    $register_result = mysqli_query($conn,$register_sql);

    if($register_result){
        echo "inserted";
    }
    else{
        echo "not";
    }

}

?>