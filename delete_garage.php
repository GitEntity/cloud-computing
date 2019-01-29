<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/29/2019
 * Time: 1:50 PM
 */

if (isset($_POST["deleteGarage"])) {
    // delete garage
    $tempQuery = "DROP TEMPORARY TABLE IF EXISTS TempCars;";
    if ($result = $mysqli->query($tempQuery)) {
        echo '<tfoot><tr><td>Garage deleted</td></tr></tfoot></table></html>';
        $result->close();
    }
}
?>

