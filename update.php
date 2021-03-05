<?php
session_start();

$username = $_SESSION['username'];

include_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delitals for <?php echo $username;?></title>
</head>
<body>
    <form method="post" action="process.php">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="update" value="Update"> <br>
    </form>
</body>
</html>