<?php
    // print_r($_POST);

    if ($_POST && $_POST['name']) {
        $isKnown = false;
        $family = array("Rob", "Kirsten", "Tommy", "Ralphie");
        foreach ($family as $value) {
            if ($_POST['name'] == $value) {
                $isKnown = true;
                break;
            }
        }

        if ($isKnown) {
            echo "Hi there ".$_POST['name'].'!';
        }
        else {
            echo "I don't know you!";
        }
    }
?>

<form method="post">
    <p>What is your name?</p>

    <p><input type="text" name="name"></p>

    <p><input type="submit" value="Submit"></p>
</form>
