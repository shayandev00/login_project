<?php
session_start();
include_once("config.php");








if (isset($_POST['register'])) {
    $con = config::connect();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (insertDetails($con, $username, $email, $password)) ;
    {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    }
}
if (isset($_POST['login'])) {
    $con = config::connect();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(checkLogin($con,$username,$password)){
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    }else{
//        echo "The Username and Password in incorrect";
        $json = array(
            "status" => false,
            "message" => "hey this is error"
        );
        $show= json_encode($json);
        echo $show;
    }
}

function insertDetails($con, $username, $email, $password)
{
    $query = $con->prepare("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");

    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);

    return $query->execute();
}

function checkLogin($con,$username,$password){
    $query = $con->prepare("SELECT * FROM users WHERE username=:username AND password=:password ");

    $query->bindParam(":username", $username);
    $query->bindParam("password", $password);

    $query->execute();

    //how many check rows and returned
    if ($query->rowCount() == 1 ){
        return true;
    }else{
        return false;
    }
}

?>

