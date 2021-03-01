<?php

class config
{
    public static function connect()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'loginpg';

        try {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


        } catch (PDOException $e) {
            echo "Connection Faild" . $e->getMessage();
        }
        return $con;
    }
}

?>