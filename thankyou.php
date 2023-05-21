<?php
session_start();
include "conn.php";
// passenger's email address
$email = $_SESSION['user_data']["email"];
print_r($_SESSION['user_data']);

// email subject
$subject = "Confirmation of flight";

// email message
$message = "Dear Passenger,\n\nThank you for choosing our airline. Here are your flight details:\n\nFlight Number: XYZ123\nPassenger Name: John Doe\nDeparture: New York City\nArrival: London\nDeparture Time: 2023-05-15 08:00:00\nArrival Time: 2023-05-15 16:00:00\nDate: 2023-05-15\n\nWe hope you enjoy your flight with us.\n\nBest regards,\nXYZ Airlines";

// headers
// $headers = "From: XYZ Airlines <no-reply.p200474@pwr.nu.edu.pk>\r\n";
// $headers .= "Reply-To: No-Reply <no-reply.p200474@pwr.nu.edu.pk>\r\n";
// $headers .= "X-Mailer: PHP/".phpversion();

$sender = "From:hassaanwaheed42@gmail.com ";
//send email
echo $email, $subject, $message;
if (mail($email, $subject, $message, $sender))
   echo "Email sent successfully to " . $email;
else
   echo "Email sending failed to " . $email;

// $stmt = $pdo->prepare("SELECT COUNT(*) FROM passenger_info WHERE CNIC = :cnic");
// $stmt->bindValue(':cnic', $_SESSION['user_data']['cnic']);
// $stmt->execute();
// $count = $stmt->fetch();

// if ($count > 0) {
//    echo "Record already exists in the database.";
// } else {

   $stmt = $conn->prepare("INSERT INTO passenger_info (CNIC, Name, Email, Departure, Destination ) VALUES (:cnic, :name, :email, :dep, :arr)");

   $stmt->bindValue(':cnic', $_SESSION['user_data']['cnic']);
   $stmt->bindValue(':name', $_SESSION['user_data']['name']);
   $stmt->bindValue(':email', $_SESSION['user_data']['email']);
   $stmt->bindValue(':dep', $_SESSION['user_data']['dep']);
   $stmt->bindValue(':arr', $_SESSION['user_data']['arr']);

   if ($stmt->execute()) {
      echo "Record inserted sucessfully!";
   } else {
      echo "Error inserting data: " . $pdo->errorInfo();
   }
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="thankyou.css">
   <script src="enable.js"></script>
   <title>Thankyou</title>
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
            <a href="booking.html">
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

      <h1>
         Thank You!
      </h1>

      <div class="div3">
         <div class="circle">
            <div class="tick"></div>
         </div>
         <div class="message" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: whitesmoke; padding:5px"><br>Success!Your reservation has been done successfully.<br> You'll receive a confirmation email shortly.</div>
      </div>

   </div>

   </div>

</body>

</html>