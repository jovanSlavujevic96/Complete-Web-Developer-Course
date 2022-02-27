<?php
    // file where is placed personal OpenWeather API key
    const fileName = "openweather_api_key.txt";

    $weather = "";
    $class = "alert-danger";

    if (array_key_exists('city', $_GET) && $_GET['city'] != "") {
        /* initial error value */
        $weather = "City named ".$_GET['city']." not found";

        /* read API key from txt file */
        $myfile = fopen(fileName, "r") or die("Unable to acquire API key!");
        $apiKey = fread($myfile, filesize(fileName));
        fclose($myfile);

        /* using `urlencode` function to fit string to url link */
        $url = "https://api.openweathermap.org/data/2.5/weather?q=".
            urlencode( $_GET['city'])."&appid=".$apiKey;

        $file_headers = @get_headers($url);
        if ($file_headers[0] != 'HTTP/1.1 404 Not Found' &&
            $file_headers[0] != 'HTTP/1.1 401 Unauthorized') {
            $urlContent = file_get_contents($url);
            $weatherArray = json_decode($urlContent, true /*return data in a form of associative array*/);

            if ($weatherArray['cod'] == 200) {
                $weather = "The weather in ".$_GET['city']." is currently '".
                    $weatherArray['weather'][0]['description']."'.";

                /* using `intval` function only to convert temp to whole number */
                $temperatureInCelcius = intval($weatherArray['main']['temp'] - 273);
                $weather .= " The temperature is ".$temperatureInCelcius."&deg;C.".
                    " The wind speed is ".$weatherArray['wind']['speed']."m/s.";

                $class = "alert-success";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather Scraper</title>

    <style text="type/css">
        /* https://css-tricks.com/perfect-full-page-background-image/ */
        html {
            background: url(background.jpeg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
        }

        .container {
            text-align: center;
            margin-top: 100px;
            width: 550px;
        }

        input {
            margin: 20px;
        }

        #weather {
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>What's The Weather?</h1>

        <form>
            <div class="form-group">
                <label for="city">Enter the name of a city.</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="E.g. London, Tokyo"
                    value="<?php
                        if (array_key_exists('city', $_GET) && $_GET['city'] != "") {
                            echo $_GET['city'];
                        }
                    ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="weather">
            <?php
                if ($weather != "") {
                    echo '<div class="alert '.$class.'" role="alert">'.$weather.'</div>';
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
