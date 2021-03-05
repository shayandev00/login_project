<?php
include_once("config.php");

$con = config::connect();

$results = fetcRecoreds($con);
function fetcRecoreds($con){

    $query = $con->prepare("
        SELECT * FROM users
    ");
    $query->execute();

    $results = $query->fetchAll();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Register Project Using PDO </title>
</head>
<body>
<h1>Login Register Project</h1>
<a href="login.php">Login</a>
<a href="register.php">Register</a>

<table>
    <tr>
        <th>Email</th>
        <th>Username</th>
    </tr>
            <?php
                    foreach($user as $user)
                    {
?>

                   <tr>
                        <td><?php echo $user['email'];?></td>  
                        <td><?php echo $user['username'];?></td>      
                   </tr>
                  
                  <?php

                    }
                
                    ?>
                    
    </table>
</body>
</html>
