<?php
    /* 
     * NOTE: This keys are working for current version of Weather-forecast website (2022-02-23)
     *       Weather-forecast website could be changed in future (it's HTML code).
     */
    const beginStrKey = '(1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">';
    const endStrKey = '</span></p></td>';

    $weather = "";
    $class = "";

    if ($_GET && $_GET['city'] && $_GET['city'] != "") {
        $success = false;
        $url = 'https://www.weather-forecast.com/locations/'.str_replace(' ', '-', $_GET['city']).'/forecasts/latest';
        $file_headers = @get_headers($url);

        if ($file_headers[0] != 'HTTP/1.1 404 Not Found') {
            $forecastPage = file_get_contents($url);

            if ($forecastPage) {
                $pageArray = explode(beginStrKey, $forecastPage);

                if (sizeof($pageArray) > 1) {
                    $pageArray = explode(endStrKey, $pageArray[1]);
                    $success = (sizeof($pageArray) > 0);
                }
            }
        }

        if ($success) {
            $weather = $pageArray[0];
            $class = "alert-success";
        }
        else {
            $weather = "City named ".$_GET['city']." not found";
            $class = "alert-danger";
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
            background: url(final_img/background.jpeg) no-repeat center center fixed; 
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
                        if ($_GET && $_GET['city'] && $_GET['city'] != "") {
                            echo $_GET['city'];
                        }
                    ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="weather">
            <?php
                if ($weather) {
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
