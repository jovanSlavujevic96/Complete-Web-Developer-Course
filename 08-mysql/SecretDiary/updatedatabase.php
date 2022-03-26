<?php
    session_start();
    include ("connection.php");

    if (array_key_exists('content', $_POST) AND array_key_exists('id', $_SESSION)) {

        $query = "UPDATE `users_final` SET `diary` = '".
            mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = ".
            mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";

        mysqli_query($link, $query);
    }
?>
