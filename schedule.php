<?php
include "conn.php";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="schedule.css">
        <title>Schedule</title>
    </head>

    <body>

        <div class="div1">
            <ul>
                <li>
                    <a href="homepage.php ">
                        <b>Home</b>
                    </a>
                </li>
                <li>
                    <a href="aboutus.html">
                        <b>About Us</b>
                    </a>
                </li>
                <li>
                    <a href="booking.php">
                        <b>Booking</b>
                    </a>
                </li>
                <li>
                    <a href="schedule.php">
                        <b>Schedule</b>
                    </a>
                </li>
                <li><input type="text" placeholder="Search..">
                    <button type="submit"></button>
                </li>

            </ul>

        </div>
        <?php
        $stmt = $conn->query('SELECT * FROM view_flight_schedule');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="div2">
            <table>
                <thead>
                    <tr>
                        <th style="width: 15%;">Flight No.</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Dep Time</th>
                        <th>Arr Time</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Flight No.']) ?></td>
                        <td><?php echo htmlspecialchars($row['Departure']) ?></td>
                        <td><?php echo htmlspecialchars($row['Destination']) ?></td>
                        <td><?php echo htmlspecialchars($row['Dep Time']) ?></td>
                        <td><?php echo htmlspecialchars($row['Arr Time']) ?></td>
                        <td><?php echo htmlspecialchars($row['Duration']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <hr/>

        <address>
            email:<a href="mailto:p200474@pwr.nu.edu.pk">p200474@pwr.nu.edu.pk</a>
            <br>
            Rafaqat Lab,Fast University
        </address>

    </body>

</html>
