<?php
    session_start();

    $error = "";

    if (array_key_exists('logout', $_GET)) {
        // delete cookies and sessions during logout
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE['id'] = "";
    }
    else if ((array_key_exists('id', $_SESSION) AND $_SESSION['id']) OR 
             (array_key_exists('id', $_COOKIE)  AND $_COOKIE['id'])) {
        // redirect to logged in page
        header("Location: 08b.logged in page.php");
    }

    if (array_key_exists('submit', $_POST)) {
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

        if (!$_POST['email']) {
            $error .= "An email address is required<br>";
        }

        if (!$_POST['password']) {
            $error .= "A password is required<br>";
        }

        if ($error != "") {
            $error = "<p>There were error(s) in your form:</p>".$error;
        }
        else {
            /***********SIGN UP***********/
            if ($_POST['signUp'] == '1') {
                $query = "SELECT id FROM `users_final` WHERE email = '".
                mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
                
                $result = mysqli_query($link, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    $error = "That email address is taken";
                }
                else {
                    $query = "INSERT INTO `users_final` (`email`,`password`) VALUES('".
                    mysqli_real_escape_string($link, $_POST['email'])."','".
                    mysqli_real_escape_string($link, $_POST['password'])."')";
                    
                    if (!mysqli_query($link, $query)) {
                        $error ="<p>Could not sign you up - please try again later.</p>";
                    }
                    else {
                        // Sign up successful
                        $userId = mysqli_insert_id($link);
                        
                        // update password to encrypted one
                        // not necessary to do that, this can be done during the INSERT
                        $password = md5( md5($userId).$_POST['password'] );
                        $query = "UPDATE `users_final` SET password = '".
                        mysqli_real_escape_string($link, $password)."' WHERE id = ".
                        $userId." LIMIT 1";
                        
                        mysqli_query($link, $query);
                        
                        $_SESSION['id'] = $userId;
                        if (array_key_exists('stayLoggedIn', $_POST)) {
                            setcookie("id", $userId, time() + 60*60*24*365);
                        }
                        
                        header("Location: 08b.logged in page.php");
                    }
                }
            }
            /************LOG IN***********/
            else {
                $error = "That email/password combination could not be found.";

                $query = "SELECT * FROM `users_final` WHERE email = '".
                    mysqli_real_escape_string($link, $_POST['email'])."'";
                
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                if (isset($row) AND array_key_exists("id", $row)) {
                    $hashedPassword = md5(md5($row['id']).$_POST['password']);
                    if ($hashedPassword == $row['password']) {
                        $_SESSION['id'] = $row['id'];
                        if (array_key_exists('stayLoggedIn', $_POST)) {
                            setcookie("id", $row['id'], time() + 60*60*24*365);
                        }

                        $error = ""; /* clear error message */
                        header("Location: 08b.logged in page.php");
                    }
                }
            }
            /**********************************/
        }
    }
?>

<div id="error">
    <?php echo $error; ?>
</div>

<form method="post">
    <input name="email" type="email" placeholder="Your Email">
    <input name="password" type="password" placeholder="Password">
    <input type="checkbox" name="stayLoggedIn">

    <input type="hidden" name="signUp" value="1">
    
    <input name="submit" type="submit" value="Sign Up!">
</form>

<form method="post">
    <input name="email" type="email" placeholder="Your Email">
    <input name="password" type="password" placeholder="Password">
    <input type="checkbox" name="stayLoggedIn">

    <input type="hidden" name="signUp" value="0">
    
    <input name="submit" type="submit" value="Log In!">
</form>