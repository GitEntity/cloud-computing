<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous">
    <style>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<h1>Virtual Car Garage</h1>
<table>
    <thead>
        <tr>
            <th>Your Garage</th>
            <th>All Cars</th>
        </tr>
    </thead>
    <tbody>
        <tr>
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

            $query = "SELECT * FROM GlobalCars";
            // retreive global car table
            if ($result = $mysqli->query($query)){
                $rowNumber = 0;
                // fetch rows
                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    echo '<html lang="en-US"><form action="<?php echo $_SERVER[\'PHP_SELF\']; ?>" method="POST">
<input type="checkbox" name="<?php $rowNumber; ?>">
</form><img src=' . $row["car image"] . ' alt=' .
                        $row["car name"] . '></html>';
                    printf ("Car Name: %s  Cat.: %s  Drivetrain: %s  HP: %s  Lbs.: %s
            Speed: %Accel.: %s  Braking: %s  Cornering: %s  Stability: %s",
                        $row["car name"], $row["category"], $row["drivetrain"],
                        $row["power"], $row["weight"], $row["acceleration"], $row["braking"],
                        $row["cornering"], $row["stability"]);
                }
                $result->close();
            }


            ?>
        </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button class="button-warning pure-button">Remove from Garage</button>
                <button class="button-success pure-button">Compare</button>
                <button class="button-error pure-button">Delete Garage</button>
            </form>
        </td>
        <td>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button class="button-secondary pure-button">Add to Garage</button>
                <button class="button-success pure-button">Create New Garage</button>
            </form>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>
