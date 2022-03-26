<?php
    if ($_GET && array_key_exists('city', $_GET) && $_GET['city'] != "") {
        require("../02.googlemaps_api/key_reader.php");

        $geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$_GET['city']."&key=".$apiKey;
        $file_headers = @get_headers($geocode_url);
        if ($file_headers[0] != 'HTTP/1.1 404 Not Found' && $file_headers[0] != 'HTTP/1.1 400 Bad Request') {
            echo json_encode(file_get_contents($geocode_url));
        }
        else {
            die("Failed to get geocode. Reason: '".$file_headers[0])."'";
        }
    }
?>
