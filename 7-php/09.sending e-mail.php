<?php
    $emailTo = "jotzilla96@gmail.com";
    $subject = "I hope this works!";
    $body = "I think you're great!";
    $headers = "From: slavujevic.jovan.96@gmail.com";

    if (mail($emailTo, $subject, $body, $headers)) {
        echo "The e-mail was sent succesfully.";
    }
    else {
        echo "The e-mail could not be sent.";
    }

    /** TODO: investigate how to avoid that your sent mails go to spam */
?>
