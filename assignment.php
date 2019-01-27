<!DOCTYPE HTML>
<html>
<head>
    </title>Virtual Car Garage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/23/2019
 * Time: 6:41 PM
 */
// attempt to connect to db
$mysqli = new mysqli("3.86.186.255",
    "phpmyadmin", "ddw6991", "assignment1");

// check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// retreive global car table
if ($result = $mysqli->query("SELECT * FROM GlobalCars", MYSQLI_USE_RESULT)){
    $result->close();
}


?>
<table>
    <thead>
    </thead>
</table>
</html>