<?php
include_once("../connection.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checker_sql ="SELECT * FROM `admin_registration` WHERE `email` = '$email'";
    $checker_result = mysqli_query($conn,$checker_sql);
    $count = mysqli_num_rows($checker_result);

    if($count == 0){
        $register_sql ="INSERT INTO `admin_registration`(`sno`, `username`, `email`, `password`) VALUES (NULL,'$name','$email','$password')";
        $register_result = mysqli_query($conn,$register_sql);

        if($register_result){
            header("Location: admin_login.php");
        }
        else{
            echo '
            <script>alert("Something Went Wrong !")
            window.location.href = "admin_login.php";
            </script>';
        }
    }
    else{
        echo '
        <script>alert("User Already Exist !")
        window.location.href = "user_login.php";
        </script>';
    }
    

}

?>