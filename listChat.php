<div id="chat">
    <?php
    $query = $pdo->query("SELECT chat.*, users.* FROM chat INNER JOIN users ON id_user = user ORDER BY id_chat ASC");
    while ($array = $query->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div id="<?= $_SESSION['user'] == $array['user'] ? 'selfUser' : 'anotherUser' ?>">
            <?= $array['message'] ?>
            <br><br>
            <span style="float: right;"><?= $array['name'] ?> // <?= $array['dateTime'] ?></span>
        </div>
        <br>
    <?php
    }
    ?>
</div>

<script>
    $(document).ready(function() {
        $('#chat').scrollTop($('#chat')[0].scrollHeight);
    })
</script>