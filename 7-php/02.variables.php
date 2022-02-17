<?php
    $name = "Jovan";    // variable is created by '$' sign
    echo "<p>My name is $name.</p>";

    $string1 = "<p>This is the first part";
    $string2 = "of a sentence</p>";

    echo $string1.' '.$string2;  // concatenating by '.' sign

    $myNumber = 45;

    $calculation = $myNumber * 31 / 97 + 4;
    echo "<div>The result of the calculation is $calculation.</div>";

    $myBool = true;
    echo "<p>This statement is true? ".$myBool."</p>";

    $variableName = "name";
    echo $$variableName; // $$variableName => $name
?>