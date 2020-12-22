<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$arrayUser = Model::user($_SESSION['user']);
?>
<div id="top" class="col-md-12">
    <h4>User: <?= $arrayUser['name'] ?></h4>
    <form method="POST" action="controller/controller.php">
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
    <div class="loading"></div>
    <form>
        <input type="hidden" id="user" value="<?= $_SESSION['user'] ?>">
        <textarea rows="3" cols="70" id="message" class="form-control" placeholder="Type a message"></textarea><br>
        <button type="button" id="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>
<br><br>