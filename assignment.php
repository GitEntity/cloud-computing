<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" type="text/css" href="/cloud-computing/style.css">
    <title>Virtual Car Garage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<h1>Virtual Car Garage</h1>
<table>
    <thead>
        <tr>
            <th>Your Garage</th>
            <th>All Cars</th>
        </tr>
    </thead>
    <tbody>
        <tr>

        </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <form>
                <input type="submit" value="Remove from Garage">
                <input type="submit" value="Compare Cars">
                <input type="submit" value="Delete Garage">
            </form>
        </td>
        <td>
            <form>
                <input type="submit" value="Add to Garage">
                <input type="submit" value="Create New Garage">
            </form>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/23/2019
 * Time: 6:41 PM
 */
// attempt to connect to db
$mysqli = new mysqli("localhost",
    "phpmyadmin", "ddw6991", "assignment1");

// check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// retreive global car table
if ($result = $mysqli->query("SELECT * FROM GlobalCars", MYSQLI_STORE_RESULT)){
    print($result);
    $result->close();
}


?>