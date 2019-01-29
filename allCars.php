<?php
include "connection.php";

$query = "SELECT * FROM GlobalCars;";

if ($result = $mysqli->query($query)){
    // js json object
    $allCars = array();

    // fetch rows
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
}
    echo json_encode($allCars);
}
?>