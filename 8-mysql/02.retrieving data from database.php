<?php
    $link = null;
    try {
        $link = mysqli_connect("localhost", "root",  "root");
    }
    catch (Exception $e) {
        die("There was an error connecting to the database");
    }

    /* request all data from `users` table of `udemy_exercise` database */
    $query = "SELECT * FROM udemy_exercise.users"; // keywords are capitalized (optional/conventional)

    /* do the query */
    $result = mysqli_query($link, $query); 
    if ($result) {
        $row = mysqli_fetch_array($result);

        // print_r($row);
        echo "<p>Your email is <strong>".$row['email']."</strong> and your password is <strong>".$row['password']."</strong></p>";
    }
?>
