<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous">
    <style>
        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/cloud-computing/style.css">
    <title>Virtual Car Garage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<h1>Virtual Car Garage</h1>
<table>
    <thead>
        <tr>
            <th>All Cars</th>
            <th class="pad">Your Garage</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <td class="pad">
            <form method="POST">
                <button class="button-secondary pure-button" name="add to garage">Add to Garage</button>
                <button class="button-success pure-button" name="create new garage">Create New Garage</button>
            </form>
        </td>
        <td class="pad">
            <form method="POST">
                <button class="button-warning pure-button" name="remove from garage">Remove from Garage</button>
                <button class="button-success pure-button" name="compare">Compare</button>
                <button class="button-error pure-button" name="delete garage">Delete Garage</button>
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

$query = "SELECT * FROM GlobalCars";
// retrieve global car table
if ($result = $mysqli->query($query)){
    echo '<html lang="en-US"><table><thead><tr>
<th class="rotate"><div><span>Select</span></div></th>
<th class="rotate"><div><span>Car Image</span></div></th>
<th class="rotate"><div><span>Car Name</span></div></th>
<th class="rotate"><div><span>Category</span></div></th>
<th class="rotate"><div><span>Drivetrain</span></div></th>
<th class="rotate"><div><span>Power (HP)</span></div></th>
<th class="rotate"><div><span>Weight (Lbs.)</span></div></th>
<th class="rotate"><div><span>Acceleration</span></div></th>
<th class="rotate"><div><span>Braking</span></div></th>
<th class="rotate"><div><span>Cornering</span></div></th>
<th class="rotate"><div><span>Stability</span></div></th>
</tr></thead>';
    // fetch rows
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo '<html lang="en-US"><tbody><tr class="border">
<td><form method="POST"><input type="checkbox" name="rowNumber[]"></form></td>
<td><img src='.$row["car image"].' alt='.$row["car name"].'></td>
<td>'.$row["car name"].'</td><td>'.$row["category"].'</td><td>'.$row["drivetrain"].'</td>
<td>'.$row["power"].'</td><td>'.$row["weight"].'</td><td>'.$row["acceleration"].'</td>
<td>'.$row["braking"].'</td><td>'.$row["cornering"].'</td><td>'.$row["stability"].'</td>
</tr></tbody>';
    }
    echo '</table></html>';
    $result->close();
}

if (isset($POST_["create new garage"])){
    // create garage (temporary db table)
    $tempQuery = "CREATE TEMPORARY TABLE IF NOT EXISTS tempCars";
    if ($result = $mysqli->query($tempQuery)){
        echo '<html lang="en-US"><table><thead><tr>
<th class="rotate"><div><span>Select</span></div></th>
<th class="rotate"><div><span>Car Image</span></div></th>
<th class="rotate"><div><span>Car Name</span></div></th>
<th class="rotate"><div><span>Category</span></div></th>
<th class="rotate"><div><span>Drivetrain</span></div></th>
<th class="rotate"><div><span>Power (HP)</span></div></th>
<th class="rotate"><div><span>Weight (Lbs.)</span></div></th>
<th class="rotate"><div><span>Acceleration</span></div></th>
<th class="rotate"><div><span>Braking</span></div></th>
<th class="rotate"><div><span>Cornering</span></div></th>
<th class="rotate"><div><span>Stability</span></div></th>
</tr></thead></table></html>';
    }
}
elseif (isset($_POST["delete garage"])){
    // delete garage
}

if (isset($_POST["add to garage"])) {
    if (!empty($_POST["rowNumber"])) {
        // add selected cars to temporary db
        foreach($_POST["rowNumber"] as $rowNumber){

            // select cars from temporary db and display
        }
    }
}
elseif (isset($_POST["remove from garage"])) {
    // remove selected cars from garage
}

if (isset($_POST["compare"])){
    // compare selected cars
}
?>