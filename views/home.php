<div id="page" class="col-md-12">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'] . '<br>';
        unset($_SESSION['msg']);
    }
    ?>
    <h3>New User</h3>
    <form method="POST" action="controller/controller.php">
        <input type="hidden" name="type" value="5">
        <input class="form-control" type="text" name="name" placeholder="Name" required><br>
        <button class="btn btn-primary float-right" type="submit" name="form">Submit</button>
    </form>
    <br><br>
    <hr>
    <h3>Users</h3>
    <?php
    $select = Model::listUsers();
    while ($array = $select->fetch(PDO::FETCH_ASSOC)) {
        echo "
            <form method='POST' action='controller/controller.php'>
            <input type='hidden' name='type' value='4'>
            <input type='hidden' name='user' value='$array[id_user]'>
            <button class='btn btn-success' type='submit' id='getChat' name='form'>$array[name]</button>
            </form>
            <br>";
    }
    ?>
</div>