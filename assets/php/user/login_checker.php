<?php
include_once("../connection.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $login_sql ="SELECT * FROM `registration` WHERE `email` = '$email' AND `password` = '$password'";
    $login_result = mysqli_query($conn,$login_sql);
    $count = mysqli_num_rows($login_result);


    if($count == 1){
        while($row = $login_result->fetch_assoc()){
            $_SESSION['username'] = $row['username'];
        }
        header("Location: ../../../index.php");
    }
    else{
        echo '
        <script>alert("User Not Found !")
        window.location.href = "user_login.php";</script>';
    }

}

?>