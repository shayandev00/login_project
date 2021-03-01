<?php

include_once("config.php");

$con = config::connect();

if (isset($_POST['register'])) {
    $con = config::connect();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   if(insertDetails($con, $username, $email, $password));
    {
        echo "Detailes Insert Successfully";
    }

}

function insertDetails($con, $username, $email, $password){
    $query = $con->prepare("
    INSERT INTO user (username,email,password)
    VALUES(:username,:email,:password)
    ");

    $query->bindParam(":username",$username);
    $query->bindParam(":email",$email);
    $query->bindParam(":password",$password);

    return $query->execute();

}
?>