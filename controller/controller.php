<?php
extract($_POST);

if (isset($form)) {

    require '../model/Model.php';
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    switch ($type) {
        case 1:

            $dateTime = date('Y-m-d H:i:s');
            $insert = Model::registerNewMessage($user, $message, $dateTime);
            if ($insert == true) {
                echo 1;
            }
            break;

        case 2:

            include('../views/listChat.php');
            break;

        case 3:

            session_destroy();
            header("Location: ../");
            break;

        case 4:

            $_SESSION['user'] = $user;
            header("Location: ../chat");
            break;

        case 5:

            $insert = Model::registerNewUser($name);
            if ($insert == true) {
                $_SESSION['msg'] = "<p style='color:green;text-align:center'>User Successfully Added!</p>";
                header("Location: ../index.php");
            } else {
                $_SESSION['msg'] = "<p style='color:green;text-align:center'>Try Again!</p>";
                header("Location: ../index.php");
            }
            break;

        default:
            header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}
