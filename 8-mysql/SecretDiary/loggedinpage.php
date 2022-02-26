<?php
    session_start();
    $message = "";

    if (array_key_exists('id', $_COOKIE)) {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if (array_key_exists('id',$_SESSION)) {
        $message = "<span>Logged In!</span>".
            "<p><a class='show-form' href='index.php?logout=1'>Log out</a></p>";
    }
    else {
        // redirect to home page
        header("Location: index.php");
    }
?>

<?php include("header.php") ?>

<div class="container">
    <?php echo $message; ?>
</div>

<?php include("footer.php") ?>
