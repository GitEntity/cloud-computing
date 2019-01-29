<?php
/**
 * Created by PhpStorm.
 * User: 100554361
 * Date: 1/29/2019
 * Time: 1:50 PM
 */

include "assignment.php";

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

    // execute query
    mysqli_query($tempQuery);

    // print html headers
    echo '<html lang="en-US"><table id="temp_table"><thead><tr>
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
}
?>