<?php
    $link = mysqli_connect("localhost", "root", "root", "udemy_exercise");

    if (mysqli_connect_error()) {
        die ("There was an error connecting to the database");
    }

    if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
        if ($_POST['email'] == '') {
            echo "<p>Email address is required.</p>";
        }
        else if ($_POST['password'] == '') {
            echo "<p>Password is required.</p>";
        }
        else {
            $query = "SELECT `id` from `users` WHERE email = '".
                mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<p>That email address has already been taken.</p>";
            }
            else {
                $query = "INSERT INTO `users` (`email`,`password`) VALUES ('".
                    mysqli_real_escape_string($link, $_POST['email'])."','".
                    mysqli_real_escape_string($link, $_POST['password'])."')";

                if (mysqli_query($link, $query)) {
                    echo "<p>You have been signed up!</p>";
                }
                else {
                    echo "<p>There was problem signing you up! Please try again later.</p>";
                }
            }
        }
    }

    /* get the elements which email ends with "gmail.com" */
    // $query = "SELECT * FROM `users` WHERE email LIKE '%gmail.com'";

    /**
     * get only email fields of elements which email contains 
     * letter p anywhere and which id is greater or equal 2
    **/
    // $query = "SELECT `email` FROM `users` WHERE email LIKE '%p%' AND id >= 2";

    // /* OPTION 1 */
    // $name = "Rob O\'Grady"; // must have \ before '
    // $query = "SELECT `email` FROM `users` WHERE name = '".$name."'";

    // /* OPTION 2 */
    // $name = "Rob O'Grady";
    // $query = "SELECT `email` FROM `users` WHERE name = '".mysqli_real_escape_string($link, $name)."'";

    // $result = mysqli_query($link, $query); 
    // while ($result && $row = mysqli_fetch_array($result)) {
    //     print_r($row);
    //     echo "<br>";
    // }
?>

<!--
Ask for email and password
Check that the email and password have been entered
Check that the email address is not already registered
Sign the user up!
-->

<form method = "post">
    <p><input name="email" type="email" placeholder="Email address"></p>

    <p><input name="password" type="password" placeholder="Password"></p>
    
    <p><input type="submit" value="Sign up"></p>
<form>
