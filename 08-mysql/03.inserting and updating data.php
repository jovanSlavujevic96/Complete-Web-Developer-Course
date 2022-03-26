<?php
    $link = mysqli_connect("localhost", "root", "root", "udemy_exercise");

    if (mysqli_connect_error()) {
        die ("There was an error connecting to the database");
    }

    /* insert new elemnt into table */
    // $query = "INSERT INTO `users` (`email`, `password`)"."VALUES('tommy@gmail.com', 'ilovemydad')";

    /* set all emails in table to this */
    // $query = "UPDATE `users` SET email = 'robpercival80@gmail.com'";

    /**
     * set the email for element which has id = 1
     * LIMIT 1 restricts update to only one element with id 1
    **/
    // $query = "UPDATE `users` SET email = 'robpercival80@gmail.com' WHERE id = 1 LIMIT 1";

    /* set the password for element which has specific email */
    $query = "UPDATE `users` SET password = 'uedjUFH7^%' WHERE email = 'robpercival80@gmail.com' LIMIT 1";

    mysqli_query($link, $query);

    $query = "SELECT * FROM users";

    $result = mysqli_query($link, $query); 
    if ($result) {
        $row = mysqli_fetch_array($result);

        echo "<p>Your email is <strong>".$row['email']."</strong> and your password is <strong>".$row['password']."</strong></p>";
    }
?>
