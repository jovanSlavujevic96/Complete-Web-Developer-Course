<?php
    $error = "";
    $successMessage = "";
    if ($_POST) {
        if (!$_POST["email"]) {
            $error .= "An email address is required.<br>";
        }
        else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "The email address is invalid.<br>";
        }

        if (!$_POST["content"]) {
            $error .= "The content is required.<br>";
        }

        if (!$_POST["subject"]) {
            $error .= "The subject is required.<br>";
        }

        if ($error != "") {
            $error =
            '<div class="alert alert-danger" role="alert">'.
                '<p><strong>There were error(s) in your form:</strong></p>'.
                $error.
            '</div>';
        }
        else {
            $sender = "slavujevic.jovan.96@gmail.com";
            $emailTo = $_POST['email'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$sender;

            if (mail($emailTo, $subject, $content, $headers)) {
                $successMessage =
                '<div class="alert alert-success" role="alert">'.
                    '<p><strong>Your message was sent, we\'ll get back to you ASAP!</strong></p>'.
                '</div>';
            }
            else {
                $error =
                '<div class="alert alert-danger" role="alert">'.
                    '<p><strong>Your message could not be sent - Please try again later.</strong></p>'.
                    $error.
                '</div>';
            }
        }
    }
?>

<!-- Boostrap V4.0 starter template -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
    <div class="container">
        <h1>Get in touch!</h1>

        <div id="error">
            <!-- echo server error var -->
            <?php echo $error.$successMessage; ?>
        </div>

        <!-- We must add "method" field with value "post" in order to see everything on server (php) -->
        <form method="post">
            <!-- We must add "name" field to XML elemnts in order to be readen by server (php) --> 
            <fieldset class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </fieldset>
            <fieldset class="form-group">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control" id="subject">
            </fieldset>
            <fieldset class="form-group">
                <label for="content">What would you like to ask us?</label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        // stop form submitting - jQuery
        // stops refreshing of page
        $("form").submit(function(e) {
            var error = "";

            if ($("#email").val() == "") {
                error += "The email field is required.<br>"
            }

            if ($("#subject").val() == "") {
                error += "The subject field is required.<br>";
            }

            if ($("#content").val() == "") {
                error += "The content field is required.<br>";
            }

            if (error != "") {
                e.preventDefault();
                error =
                '<div class="alert alert-danger" role="alert">\
                    <p><strong>There were error(s) in your form:</strong></p>' +
                    error +
                '</div>';
                $("#error").html(error);
            }
            else {
                $("form").unbind("submit").submit();
            }
        });
    </script>
</body>
</html>