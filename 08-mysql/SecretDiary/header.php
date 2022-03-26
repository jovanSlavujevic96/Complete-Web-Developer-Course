<!--
    THIS PART IS COMMON FOR ALL PAGES:
    index.php
    loggedinpage.php
-->

<!doctype html>
<html lang="en">
<head>
    <!-- TAKE IMAGE FROM: https://unsplash.com/ -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <title>Secret Diary</title>

    <style type="text/css">
        html {
            background: url(background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-backgrdoun-size: cover;
            -o-backgrdoun-size: cover;
            margin: 0;
        }

        body {
            background: none;
            color: white;
            margin: 0;
        }

        .middle-center {
            /* iii VERTICAL CENTER !!! */
            display:flex;
            flex-direction:column;
            justify-content:center;
            min-height:100vh;
        }

        .container {
            text-align: center;
            width: 400px;
            height: 100%;
        }

        #signUpForm {
            display: none; /* hidden */
        }

        /* for some reason it must be !important -> it ignores class text color, but does it for id */
        .show-form {
            font-weight: bold;
            color: lightblue !important;
        }
        .show-form:hover {
            cursor: pointer;
            color: blue !important;
            text-decoration: underline !important;
        }

        #diary {
            margin: 2% 0%;
            width: 100%;
            height: 80vh;
        }

        .nice-font {
            font-family: 'Dancing Script', cursive;
        }

    </style>
</head>
<body>
