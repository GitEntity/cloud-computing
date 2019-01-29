<?php
include "connection.php";


if(isset($_GET['query'])){
    $query =$_GET['query'];
    $sql = "SELECT * FROM `GlobalCars` WHERE `car name` LIKE '%".$query."%'";


    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

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

        while($row = $result->fetch_assoc())
        {
            echo '<html lang="en-US"><tbody><tr class="border">
            <td><form method="POST" id="allCars" action="<?php echo $_SERVER[\'PHP_SELF\']; ?>"><input type="checkbox" name="rowNumber[]"></form></td>
            <td><img src='.$row["car image"].' alt='.$row["car name"].'></td>
            <td>'.$row["car name"].'</td><td>'.$row["category"].'</td><td>'.$row["drivetrain"].'</td>
            <td>'.$row["power"].'</td><td>'.$row["weight"].'</td><td>'.$row["speed"].'</td><td>'.$row["acceleration"].'</td>
            <td>'.$row["braking"].'</td><td>'.$row["cornering"].'</td><td>'.$row["stability"].'</td>
            </tr></tbody>';
        }
        // //header("Content-type: image/png");
        // header('Content-Disposition: attachment; filename="'.$name.'"');
        // // header("Content-Transfer-Encoding: BASE64");
        // // header('Expires: 0');
        // // header('Pragma: no-cache');
        // //header("Content-Length: ".strlen($image->data));
        // echo $image;
        echo '</table></html>';

    } else {
        echo "0 results";
    }
}
else {echo 'Error: ID is needed';}


?>