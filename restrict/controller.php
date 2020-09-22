<?php
extract($_POST);
extract($_GET);

if (isset($form)) {

    require 'model.php';
    $dataBase = new DataBase($conn);
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    switch ($type) {
        case 1:

            $dateTime = date('Y-m-d H:i:s');
            $insert = $dataBase->registerNewMessage($user, $message, $dateTime);
            if ($insert == true) {
                echo 1;
            }
            break;

        case 2:

            include('../listChat.php');
            break;

        case 3:

            session_destroy();
            header("Location: ../index.php");
            break;

        case 4:

            $_SESSION['user'] = $user;
            header("Location: ../index.php?page=chat");
            break;

        case 5:

            $insert = $dataBase->registerNewUser($name);
            if ($insert == true) {
                $_SESSION['msg'] = "<p style='color:green;text-align:center'>User Successfully Added!</p>";
                header("Location: ../index.php");
            } else {
                $_SESSION['msg'] = "<p style='color:green;text-align:center'>Try Again!</p>";
                header("Location: ../index.php");
            }
            break;

        default:
            header('Location: index.php');
    }
} elseif (isset($page) || @$page == '') {

    @$pagina = $page;
    if ($pagina == '' || $pagina == 'index.php') {
        include('home.php');
    } elseif (file_exists($pagina . '.php')) {
        include($pagina . '.php');
    }
} else {
    header('Location: index.php');
}
