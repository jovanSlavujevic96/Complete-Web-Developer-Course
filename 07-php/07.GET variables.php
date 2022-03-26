<?php
    /**
     * e.g.
     * https://www.CompleteWebDeveloperCourse.com/7-php/?name=rob&password=1234&gender=male
     *
     * you are passing following variables:
     * ?name = "rob";
     * ?password = "1234";
     * ?gender = "male";
     * 
     * We can print them like this
     * print_r($_GET);
    **/
    $number = null;
    if ($_GET && $_GET['number']) {
        $number = $_GET['number'];
    }

    // check is passed var a positive round number
    if ($number != null && is_numeric($number) && $number > 0 && $number == round($number, 0)) {
        $i = 2;
        $isPrime = true;

        while ($i < $number) {
            // check is number dividable by $i
            if ($number % $i == 0) {
                // number is not prime!
                $isPrime = false;
            }
            $i++;
        }

        echo '<p>'.$number;
        if ($isPrime) {
            echo " is ";
        }
        else {
            echo " is not ";
        }
        echo " prime number.</p>";
    }
    else {
        // User has submitted something which is not a positive whole number
        echo "<p style='color:red'>
                <strong>Please enter a positive whole number!!!</strong>
              </p>";
    }
?>

<p>Please enter a whole number.</p>

<form>
    <input name="number" type="text">
    <input type="submit" value="Go!">
</form>
