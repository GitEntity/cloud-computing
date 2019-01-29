<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/23/2019
 * Time: 6:41 PM
 */

include "connection.php";
if(isset($_GET['query'])){
    $searchQuery = $_GET['query'];
$query = "SELECT * FROM GlobalCars `car name` LIKE %"+$searchQuery+"%";
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

        // js json object
    }

    echo '</table></html>';
    $result->close();
}

// close db connection
$mysqli->close();}
?>