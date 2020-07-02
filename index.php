<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Basic Chat</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>

<body>
    <div id="container">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'] . '<br>';
            unset($_SESSION['msg']);
        }
        ?>
        <h3>New User</h3>
        <form method="POST" action="modelChat.php">
            <input type="hidden" name="type" value="5">
            <input type="text" name="name" placeholder="name" required>
            <button type="submit">Send</button>
        </form>
        <hr>
        <h3>Users</h3>
        <?php
        $query = $pdo->query("SELECT * FROM users ORDER BY name ASC");
        while ($array = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <form method='POST' action='modelChat.php'>
            <input type='hidden' name='type' value='4'>
            <input type='hidden' name='user' value='$array[id_user]'>
            <button type='submit' id='getChat'>$array[name]</button>
            </form>
            <br>";
        }
        ?>
    </div>
</body>

</html>