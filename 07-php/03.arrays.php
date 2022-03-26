<?php
    $myArray = array("Rob", "Kirsten", "Tommy", "Ralphie");
    print_r($myArray);

    echo '<p>'.$myArray[1].'</p>';

    $anotherArray[0] = "pizza";
    $anotherArray[1] = "yoghurt";

    $anotherArray[5] = "coffee";  // php arrays are associative -> you can put anything to their index

    $anotherArray["myFavouriteFood"] = "ice cream";

    print_r($anotherArray);

    echo '<p>';
    $thirdArray = array("France" => "French", "Germany" => "German", "Austria" => "German");
    print_r($thirdArray);
    echo '</p>';

    echo '<p>'.sizeof($thirdArray).'</p>'; // prints number of elements in array

    $myArray[] = "Katie"; // add element to the end of array
    print_r($myArray);
?>