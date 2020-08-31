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
    $_COOKIE['start_test'] = 'start_test';
    $_SESSION['test_val'] = 'test_val';

    $cookies = new Cookies($_COOKIE);
    $session = new Session($_SESSION);
    $request = new Request($_GET, $_POST, $_SERVER, $cookies, $session);

    $cookie_methods = get_class_methods($cookies);
    var_dump($cookie_methods);
    echo "\n";
    $cookie_1 = $cookies->all([]);
    var_dump( $cookie_1);
    echo "\n";
    $cookie_2 = $cookies->get('start_test');
    var_dump( $cookie_2);
    echo "\n";
    ?>
</p>
</body>
