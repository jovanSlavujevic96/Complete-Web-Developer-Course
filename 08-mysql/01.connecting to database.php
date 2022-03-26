<?php
    /* mysql_connect is deprecated */
    $ret = mysqli_connect("localhost" /*server*/, "root" /*database username*/,  "root" /*password*/);
    if ($ret) {
        echo "MYSQL connection successfull";
    }
    else {
        echo "MYSQL connection failed : ".mysqli_connect_error(); /* prints errors */
    }
?>
