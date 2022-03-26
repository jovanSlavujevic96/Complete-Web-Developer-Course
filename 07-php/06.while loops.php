<?php
    $i = 5;
    while ($i <= 50) {
        echo $i."<br>";
        $i += 5;
    }

    echo "<br><br>";

    $i = 1;
    while ($i <= 10) {
        $j = $i * 5;

        echo $j."<br>";

        $i++;
    }

    echo "<br><br>";

    $family = array("Rob", "Kirsten", "Ralphie", "Katie");
    $i = 0;
    while ($i < sizeof($family)) {
        echo $family[$i++]."<br>";
    }
?>