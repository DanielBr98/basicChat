<div id="chat">
    <div id="page" class="row">
        <?php
        $select = $dataBase->listChat();
        while ($array = $select->fetch(PDO::FETCH_ASSOC)) {
            if ($_SESSION['user'] == $array['user']) {
                echo "<div class='col-md-5'></div>";
            }
        ?>
            <div class="col-md-6" id="<?= $_SESSION['user'] == $array['user'] ? 'selfUser' : 'anotherUser' ?>">
                <?= $array['message'] ?>
                <br><br>
                <span style="float: right;"><?= $array['name'] ?> // <?= $array['dateTime'] ?></span>
            </div>
            <br>
        <?php
            if ($_SESSION['user'] != $array['user']) {
                echo "<div class='col-md-5'></div>";
            }
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#chat').scrollTop($('#chat')[0].scrollHeight);
    })
</script>