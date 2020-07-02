<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require 'connection.php';
extract($_POST);
if ($type == 1) {
    $dateTime = date('Y-m-d H:i:s');
    $insert = $pdo->query("INSERT INTO chat (user, message, dateTime) VALUES ($user, '$message', '$dateTime')");
    if ($insert == true) {
        echo 1;
    }
} elseif ($type == 2) {
    include 'listChat.php';
} elseif ($type == 3) {
    session_destroy();
    header("Location: index.php");
} elseif ($type == 4) {
    $_SESSION['user'] = $user;
    header("Location: chat.php#field");
} elseif ($type == 5) {
    $insert = $pdo->query("INSERT INTO users (name) VALUES ('$name')");
    if ($insert == true) {
        $_SESSION['msg'] = "<p style='color:green'>User Successfully Added</p>";
        header("Location: index.php");
    }
}
