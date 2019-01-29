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
            <form method="POST" id="yourGarage">
                <button type="button" id="yourGarage" class="button-secondary pure-button"
                        name="addToGarage">Add to Garage</button>
                <button type="button" id="yourGarage" class="button-success pure-button"
                        name="createNewGarage">Create New Garage</button>
            </form>
        </td>
        <td class="pad">
            <form method="POST" id="allCars">
                <button type="button" id="allCars" class="button-warning pure-button"
                        name="removeFromGarage">Remove from Garage</button>
                <button type="button" id="allCars" class="button-success pure-button"
                        name="compare">Compare</button>
                <button type="button" id="allCars" class="button-error pure-button"
                        name="deleteGarage">Delete Garage</button>
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
// attempt to connect to db
$mysqli = new mysqli("localhost",
    "phpmyadmin", "ddw6991", "assignment1");

// check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM GlobalCars;";
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
<th class="rotate"><div><span>Speed</span></div></th>
<th class="rotate"><div><span>Acceleration</span></div></th>
<th class="rotate"><div><span>Braking</span></div></th>
<th class="rotate"><div><span>Cornering</span></div></th>
<th class="rotate"><div><span>Stability</span></div></th>
</tr></thead>';
    // fetch rows
    $allCars = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo '<html lang="en-US"><tbody><tr class="border">
<td><form method="POST" id="allCars"><input type="checkbox" name="rowNumber[]"></form></td>
<td><img src='.$row["car image"].' alt='.$row["car name"].'></td>
<td>'.$row["car name"].'</td><td>'.$row["category"].'</td><td>'.$row["drivetrain"].'</td>
<td>'.$row["power"].'</td><td>'.$row["weight"].'</td><td>'.$row["speed"].'</td><td>'.$row["acceleration"].'</td>
<td>'.$row["braking"].'</td><td>'.$row["cornering"].'</td><td>'.$row["stability"].'</td>
</tr></tbody>';
        $allCars[] = $row;
    }
    echo '</table></html>';
    $result->close();
    print json_encode($allCars);
}

if (isset($POST_["createNewGarage"])){
    echo '<html lang="en-US"><h1>hello world</h1></html>';
    // create garage (temporary db table)
    $tempQuery = "CREATE TEMPORARY TABLE IF NOT EXISTS `TempCars`(
`car name` varchar(55) NOT NULL,
`car image` varchar(67) DEFAULT NULL,
`category` varchar(5) DEFAULT NULL,
`drivetrain` varchar(3) DEFAULT NULL,
`power` int(3) DEFAULT NULL,
`weight` int(4) DEFAULT NULL,
`speed` decimal(3,1) DEFAULT NULL,
`acceleration` decimal(2,1) DEFAULT NULL,
`braking` decimal(2,1) DEFAULT NULL,
`cornering` decimal(2,1) DEFAULT NULL,
`stability` decimal(2,1) DEFAULT NULL,
PRIMARY KEY (`car name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $mysqli->query($tempQuery);
    echo '<html lang="en-US"><table><thead><tr>
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
</tr></thead></table></html>';
        $result->close();
}

elseif (isset($_POST["deleteGarage"])){
    // delete garage
    $tempQuery = "DROP TEMPORARY TABLE IF EXISTS TempCars;";
    if ($result = $mysqli->query($tempQuery)){
        echo '<tfoot><tr><td>Garage deleted</td></tr></tfoot></table></html>';
        $result->close();
    }
}

if (isset($_POST["addToGarage"])) {
    if (!empty($_POST["rowNumber"])) {
        // add selected cars to garage

        foreach($_POST["rowNumber"] as $rowNumber){

            // select cars from garage and display
        }
    }
}
elseif (isset($_POST["removeFromGarage"])) {
    // remove selected cars from garage
}

if (isset($_POST["compare"])){
    // compare selected cars with Chart.js
}

// close db connection
$mysqli->close();
?>