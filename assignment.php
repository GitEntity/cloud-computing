<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous">
    <style type="text/css">
        #chart-container {
            width: 640px;
            height: auto;
        }

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script type="text/javascript" src="/cloud-computing/carchart.js"></script>
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
        <td>
            <form id="yourGarage">
                <button type="submit" id="yourGarage" class="button-secondary pure-button"
                        name="addToGarage" >Add to Garage</button>
                <button type="submit" id="yourGarage" class="button-success pure-button"
                        name="createNewGarage" formaction="/cloud-computing/create_garage.php">Create New
                    Garage</button>
            </form>
        </td>
        <td class="pad">
            <form method="POST" id="allCars">
                <button type="submit" id="allCars" class="button-warning pure-button"
                        name="removeFromGarage" formaction="/cloud-computing/remove_from_garage.php">Remove from
                    Garage</button>
                <button type="submit" id="allCars" class="button-success pure-button"
                        name="compare" formaction="/cloud-computing/compare.php">Compare</button>
                <button type="submit" id="allCars" class="button-error pure-button"
                        name="deleteGarage" formaction="/cloud-computing/delete_garage.php">Delete Garage</button>
            </form>
        </td>
    </tr>
    </tfoot>
</table>
<div id="chart-container">
    <canvas id="myCanvas"></canvas>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/23/2019
 * Time: 6:41 PM
 */

include "connection.php";

$query = "SELECT * FROM GlobalCars;";
// retrieve global car table
if ($result = $mysqli->query($query)){
    echo '<html lang="en-US"><table id="main_table"><thead><tr>
<th class="rotate"><div><span>Select</span></div></th>
<th class="rotate"><div><span>Car Image</span></div></th>
<th class="rotate"><div><span>Car Name</span></div></th>
<th class="rotate"><div><span>Category</span></div></th>
<th class="rotate"><div><span>Drivetrain</span></div></th>
<th class="rotate"><div><span>Power (HP)</span></div></th>
<th class="rotate"><div><span>Weight (Lbs.)</span></div></th>
<th class="rotate"><div><span>Speed</span></div></th>
<th class="rotate"><div><span>Acceleration</span></div></th>
<th class="rotate"><div><span>Braking</span></div></th>
<th class="rotate"><div><span>Cornering</span></div></th>
<th class="rotate"><div><span>Stability</span></div></th>
</tr></thead>';

    // js json object
    $allCars = array();

    // fetch rows
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<html lang="en-US"><tbody><tr class="border">
<td><form method="POST" id="allCars" action="<?php echo $_SERVER[\'PHP_SELF\']; ?>"><input type="checkbox" name="rowNumber[]"></form></td>
<td><img src='.$row["car image"].' alt='.$row["car name"].'></td>
<td>'.$row["car name"].'</td><td>'.$row["category"].'</td><td>'.$row["drivetrain"].'</td>
<td>'.$row["power"].'</td><td>'.$row["weight"].'</td><td>'.$row["speed"].'</td><td>'.$row["acceleration"].'</td>
<td>'.$row["braking"].'</td><td>'.$row["cornering"].'</td><td>'.$row["stability"].'</td>
</tr></tbody>';
        $tmp_object = new stdClass();
        $tmp_object->car_name = $row["car name"];
        $tmp_object->category = $row["category"];
        $tmp_object->power = $row["power"];
        $tmp_object->acceleration = $row["acceleration"];
        $tmp_object->drivetrain = $row["drivetrain"];
        $tmp_object->weight = $row["weight"];
        $tmp_object->speed = $row["speed"];
        $tmp_object->braking = $row["braking"];
        $tmp_object->cornering = $row["cornering"];
        $tmp_object->stability = $row["stability"];

        array_push($allCars, $temp_object);
        // js json object
    }
    
    echo '</table></html>';
    $result->close();
}

// close db connection
$mysqli->close();
?>