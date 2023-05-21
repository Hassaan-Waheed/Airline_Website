<?php
session_start();
include "conn.php";

//$_SESSION['payment_error']["cardNumberErr"];

if (isset($_SESSION['payment_error'])) {
    $error = $_SESSION['payment_error'];
    print_r($error);
//unset($_SESSION['payment_error']);
} else{
}
    $error = array();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <script src="enable.js"></script>
    <title>Payment</title>
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

    <div class="div2">
        <h1>Payment</h1>
        <form method="POST" action="paymentprocess.php">
            <div style="display: flex; justify-content: space-between;">
                <div style="margin-left: 80px;">
                    
                    <div>
                        <input type="radio" id="debit-credit" name="payment-type" value="debit-credit" onclick="enableCardFields()">
                        <label for="debit-credit">Debit/Credit Cards</label>
                        <span class="error" <?php if(isset($error['paymentTypeErr'])) echo $error['paymentTypeErr']; ?>></span>
                    </div>
                    <div style="margin-top: 10px;">
                        <input style="margin-left:10px;" type="text" id="card-number" name="card-number" placeholder="Card Number" disabled>
                        <span class="error" <?php if(isset($error['cardNumberErr'])) echo $error['cardNumberErr']; ?>></span>
                        <input type="text" id="cvc" name="cvc" placeholder="CVC" style="margin-left: 10px;" disabled>
                        <span class="error" <?php if(isset($error['cvcErr'])) echo $error['cvcErr']; ?>></span>
                    </div>
                </div>
                <div style="margin-left: 150px;">
                    <div>
                        <input type="rad    io" id="easypaisa-jazzcash" name="payment-type" value="easypaisa-jazzcash" onclick="enableMobileField()">
                        <label for="easypaisa-jazzcash">Easypaisa/Jazz Cash</label>
                    </div>
                    <div style="margin-top: 10px;">
                        <input style="margin-left:15px" type="text" id="mobile-number" name="mobile-number" placeholder="Mobile Number" disabled>
                        <span class="error" <?php if(isset($error['mobileNumberErr'])) echo $error['mobileNumberErr']; ?>></span>
                    </div>
                </div>
                
            </div>
            <?php
                    if (isset($_SESSION['user_data'])) 
                    {
                        $user_data = $_SESSION['user_data'];
                        //unset($_SESSION['user_data']);
                    }
                     else 
                        $user_data = array();
                        
                    $dep=$user_data['dep'];
                    $arr=$user_data['arr'];
                    try {
                            if(isset($dep) || isset($arr)) 
                            {
                                $stmt = $conn->prepare('SELECT * FROM view_flight_pricing WHERE Departure = :dep && Destination= :arr');
                                $stmt->execute(array('dep' => $dep, 'arr' => $arr));
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } else
                                throw new Exception('Department or Arrival parameter is not set.');
                        } 
                        catch (Exception $e)
                        {
                            echo 'Error: ' . $e->getMessage();
                    
                        }
                        
                
            ?>
            <table>
                <thead>
                    <tr>
                        <th style="width: 20%;">Flight No.</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Duration</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Flight No.']) ?></td>
                        <td><?php echo htmlspecialchars($row['Departure']) ?></td>
                        <td><?php echo htmlspecialchars($row['Destination']) ?></td>
                        <td><?php echo htmlspecialchars($row['Duration']) ?></td>
                        <td><?php echo htmlspecialchars($row['Price']) ?></td>
                    </tr>

                    <?php    endforeach; ?>
                     
                
                </tbody>
            </table>

            <hr>

                    
            <button style="margin-left:530px; margin-top:20px;"type="submit">
                Submit
            </button>
        </form>

    </div>


</body>

</html>