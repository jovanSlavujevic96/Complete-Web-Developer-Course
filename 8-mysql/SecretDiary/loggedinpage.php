<?php
    session_start();

    if (array_key_exists('id', $_COOKIE)) {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if (array_key_exists('id',$_SESSION)) {
        echo "Logged In!".
            "<p><a href='index.php?logout=1'>Log out</a></p>";
    }
    else {
        // redirect to home page
        header("Location: index.php");
    }
?>

<?php include("header.php") ?>

<?php include("footer.php") ?>
