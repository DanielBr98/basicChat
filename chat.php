<?php
session_start();
if (isset($_SESSION['user'])) {
    require 'connection.php';
    $queryUser = $pdo->query("SELECT * FROM users WHERE id_user = $_SESSION[user]");
    $arrayUser = $queryUser->fetch(PDO::FETCH_ASSOC);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Basic Chat</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src='main.js'></script>
    </head>

    <body>
        <header>
            <div id="top">
                <p>User: <?= $arrayUser['name'] ?></p>
                <form method="POST" action="modelChat.php">
                    <input type="hidden" name="type" value="3">
                    <button type="submit">Logout</button><br><br>
                </form>
            </div>
        </header>
        <div id="container">
            <div id="listChat">
                <?php
                include 'listChat.php';
                ?>
            </div>
            <br>
            <div id="alert"></div>
            <div id="field">
                <textarea rows="3" cols="70" class="message" placeholder="message" value=""></textarea><br>
                <button type="submit" class="newMessage" style="float: right;" value="<?= $_SESSION['user'] ?>">Send</button>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("Location:index.php");
}
?>