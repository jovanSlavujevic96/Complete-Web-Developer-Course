<?php
    // file where is placed personal OpenWeather API key
    const fileName = __DIR__.'/'."googlemaps_api_key.txt";

    /* read API key from txt file */
    $myfile = fopen(fileName, "r") or die("Unable to acquire API key!");
    $apiKey = fread($myfile, filesize(fileName));
    fclose($myfile);

    $link = "https://maps.googleapis.com/maps/api/js?key=".$apiKey."&callback=initMap&v=weekly";

    if ($_GET AND array_key_exists('echo', $_GET) AND $_GET['echo'] == '1') {
        echo $apiKey;
    }
?>
