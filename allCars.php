
<?php

include "connection.php";

//Gets all data for Memes Table
$query = "SELECT * FROM GlobalCars;";

$result = $mysqli->query($query);


//Adds the data to a array
$allCars = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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

        array_push($allCars, $tmp_object);
}
    
} else {
    echo "0 results";
}
header("Content-type: application/json");


//outputs the JSON Object
echo json_encode($allCars);



?>
