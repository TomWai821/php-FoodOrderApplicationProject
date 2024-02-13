<?php

    //Start Session
    session_start();

    //Create CPmstamts to store non repeating values
    define('SITEURL','http://localhost:4433/phpRestfulProject');
    define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');

    date_default_timezone_set('Asia/Hong_Kong');
    $con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($con, DB_NAME) or die(mysqli_error());
?>