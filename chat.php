<?php
if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}
$arrayUser = $dataBase->user($_SESSION['user']);
?>
<div id="top" class="col-md-12">
    <h4>User: <?= $arrayUser['name'] ?></h4>
    <form method="POST" action="restrict/controller.php">
        <input type="hidden" name="type" value="3">
        <button class="btn btn-primary" type="submit" name="form">Logout</button><br><br>
    </form>
</div>
<div id="listChat">
    <?php
    include 'listChat.php';
    ?>
</div>
<hr>
<div id="alert"></div>
<div id="page">
    <textarea rows="3" cols="70" class="message form-control" placeholder="message" value=""></textarea><br>
    <button type="submit" class="newMessage btn btn-primary float-right" value="<?= $_SESSION['user'] ?>">Submit</button>
</div>
<br><br>