<link rel="stylesheet" href="assets/css/register_style.css">
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        Welcome <span class="user"><?= $_SESSION['firstname'] ?></span>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "user accounts");
        //Select queries return a resultset
        $sql = "SELECT firstname FROM users";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
    </div>
</div>
