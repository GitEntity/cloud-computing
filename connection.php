<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/29/2019
 * Time: 2:55 PM
 */
// attempt to connect to db
$mysqli = new mysqli("localhost",
    "phpmyadmin", "ddw6991", "assignment1");

// check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>


