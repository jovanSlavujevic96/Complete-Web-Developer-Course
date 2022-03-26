<?php
    session_start();

    include ("connection.php");

    $userEmail = "";
    $userDiary = "";

    if (array_key_exists('id', $_COOKIE)) {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if (array_key_exists('id', $_SESSION)) {
        $query = "SELECT `email`,`diary` FROM `users_final` WHERE id = '".$_SESSION['id']."' LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if (isset($row)) {
            if (array_key_exists('email', $row)) {
                $userEmail = $row['email'];
            }
            if (array_key_exists('diary', $row)) {
                $userDiary = $row['diary'];
            }
        }
    }
    else {
        // redirect to home page
        header("Location: index.php");
    }
?>

<?php include("header.php") ?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navbar">
    <a class="navbar-brand" href="index.php">
        <img src="diary-logo.png" width="30" height="30" class="d-inline-block align-top" alt="diary-logo">
        <span class="nice-font">Secret Diary</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-dark" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nice-font nav-link disabled">
                    <?php echo $userEmail; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?logout=1">
                    <img src="logout-sign.png" width="30" height="30" class="d-inline-block align-top" alt="logout-sign">
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <textarea id="diary" class="form-control"><?php echo $userDiary; ?></textarea>
</div>

<?php include("footer.php") ?>
