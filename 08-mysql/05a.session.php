<?php
    session_start();

    // $_SESSION['username'] = "robpercival";
    // echo $_SESSION['username'];
    /* even commented $_SESSION knows value when it's set at the moment */

    if ($_SESSION['email']) {
        echo "You are logged in!";
    }
    else {
        header("Location: 05b.session variables.php");
    }
?>
