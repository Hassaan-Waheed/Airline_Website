<?php
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Admin</title>
</head>
<?php
                try {
                    
                    $query = "SELECT * FROM passenger_info";
                    $stmt = $conn->query($query);
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                }
                catch(PDOException $e ){
                    echo "connection failed!".$e->getMessage();
                }

?>

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

    <div class="div2">

    <table>
                <thead>
                    <tr>
                        <th style="width: 20%;">CNIC</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['CNIC']) ?></td>
                        <td><?php echo htmlspecialchars($row['Name']) ?></td>
                        <td><?php echo htmlspecialchars($row['Email']) ?></td>
                        <td><?php echo htmlspecialchars($row['Departure']) ?></td>
                        <td><?php echo htmlspecialchars($row['Destination']) ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?php echo $record['id']; ?>"><i class='fas fa-edit'></i></a> |
                            <a href="delete.php?id=<?php echo $record['id']; ?>"><i class='fas fa-trash-alt'></i></a>
                        </td>
                    </tr>

                    <?php    endforeach; ?>
                    
                
                </tbody>
            </table>

    </div>

    </body>

</html>
    