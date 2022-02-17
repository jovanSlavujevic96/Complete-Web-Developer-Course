<?php
    for ($i = 2; $i <= 10; $i += 2) {
        echo $i."<br>";
    }

    echo '<br><br>';
    $family = array("Rob", "Kirsten", "Tommy", "Ralphie");
    foreach ($family as $key => $value) {
        /* this changes the original element */
        $family[$key] = $value." Percival";

        /* this changes the copy of element */
        /* $value = $value." Percival"; */ 
        echo "Array item ".$key." is ".$value.'<br>';
    }

    echo '<br><br>';
    for ($i = 0; $i < sizeof($family); ++$i) {
        echo $family[$i].'<br>';
    }
?>