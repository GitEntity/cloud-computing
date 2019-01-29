<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/29/2019
 * Time: 1:51 PM
 */

include "assignment.php";

if (isset($_POST["addToGarage"])) {
    if (!empty($_POST["rowNumber"])) {
        // add selected cars to garage

        foreach($_POST["rowNumber"] as $rowNumber){

            // select cars from garage and display
        }
    }
}
?>