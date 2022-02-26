<!doctype html>
<html lang="en">
<head>
    <!-- TAKE IMAGE FROM: https://unsplash.com/ -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Secret Diary</title>

    <style type="text/css">
        html {
            background: url(background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-backgrdoun-size: cover;
            -o-backgrdoun-size: cover;
        }

        body {
            background: none;
            color: white;

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

        #logInForm {
            display: none; /* hidden */
        }

        /* for some reason it must be !important -> it ignores class text color, but does it for id */
        .show-toggle-form {
            font-weight: bold;
            color: lightblue !important;
        }
        .show-toggle-form:hover {
            cursor: pointer;
            color: blue !important;
            text-decoration: underline !important;
        }
    </style>
</head>
<body>
