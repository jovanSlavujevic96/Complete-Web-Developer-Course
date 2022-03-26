<?php
    $link = null;
    try {
        $link = mysqli_connect("localhost", "root", "root", "udemy_exercise");
    }
    catch (Exception $e) {
        die ("Database connection error.");
    }

    /* double check */
    if (mysqli_connect_error()) {
        die ("Database connection error.");
    }
?>