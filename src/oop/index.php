<?php
include "Cookies.php";
include "Session.php";
include "Request.php";

?>
<!doctype html>
<head>
     <title>Test</title>
</head>
<body>
<p>
    <?php
    $_COOKIE['start_c'] = 'C_start';
    $cookies = new Cookies($_COOKIE);
    $cookie_methods = get_class_methods($cookies);
    echo 33;
    ?>
</p>
</body>
