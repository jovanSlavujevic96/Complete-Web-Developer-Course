<?php
    session_start();

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
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: 05a.session.php");
                }
                else {
                    echo "<p>There was problem signing you up! Please try again later.</p>";
                }
            }
        }
    }
?>

<form method = "post">
    <p><input name="email" type="email" placeholder="Email address"></p>

    <p><input name="password" type="password" placeholder="Password"></p>
    
    <p><input type="submit" value="Sign up"></p>
<form>
