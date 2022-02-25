<?php
    // echo md5("password");
    # crack md5 password on https://crackstation.net/

    // $salt = "isefjfehi2736582KUFED";
    // echo md5($salt."password");

    /* OPTION 1 */
    $row['id'] = 73;
    $hash = md5(md5($row['id'])."password");
    echo "<p>MD5:".$hash."</p>";

    /* OPTION 2 */
    $hash = password_hash("password", PASSWORD_DEFAULT);
    echo "<p>PASSWORD_HASH: ".$hash."</p>";

    // Using password_vefify() to check if "password" matches the hash.
    // Try changing "password" below to something else and then refresh the page.
    if (password_verify("password", $hash)) {
        echo "Password is valid!";
    }
    else {
        echo "Invalid password.";
    }
?>
