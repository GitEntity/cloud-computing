<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/29/2019
 * Time: 1:52 PM
 */
include "connection.php";

if (isset($_POST["compare"])){
    // compare selected cars with Chart.js
    //print(json_decode($allCars, true));
    foreach($allCars["car name"] as $carName){
        echo $carName;
    }
}
?>