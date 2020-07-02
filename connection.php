<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>