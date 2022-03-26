<?php
    /* how to create cookie */
    // setcookie(
    //     /*variable name */ "customerId",
    //     /*variable value*/ "1234",
    //     /*expire date   */time() /*current time*/ + 60 /*seconds*/ * 60 /*minutes*/ * 24 /*hours*/
    // );
    /**
     * even commented $_COOKIE knows value when it's set at
     * the moment + if you shut down browser it will be available
    **/

    echo $_COOKIE["customerId"];

    /* how to update cookie */
    // $_COOKIE["customerId"] = "1235";

    /* how to remove cookie */
    // setcookie("customerId", "", time() - 60 * 60);
    /** 
     * just set the passed time for expire date, variable value is not important - it could be anything
     * NOTE: it would remove cookie in next load of the page!
    **/
?>
