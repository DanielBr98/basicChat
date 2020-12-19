<?php
if (isset($_GET['url'])) {

    $url = explode('-', $_GET['url']);

    if (file_exists("views/$url[0].php")) {

        $id = (isset($url[1]) ? $url[1] : NULL);
        require_once "views/$url[0].php";
    } else {

        echo '<h1 style="text-align:center;margin-top:200px">Page not found</h1>';
    }
} else {

    require_once "views/home.php";
}
