<?php
    session_start();

    if (array_key_exists('id', $_COOKIE)) {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if (array_key_exists('id',$_SESSION)) {
        echo "Logged In!".
            "<p><a href='08a.login and signup.php?logout=1'>Log out</a></p>";
    }
    else {
        // redirect to home page
        header("Location: 08a.login and signup.php");
    }
?>
