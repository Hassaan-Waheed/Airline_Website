<?php
session_start();
// $cardNumber = $cvc = $mobileNumber = "";
// $cardNumberErr = $cvcErr = $mobileNumberErr = "";
include "conn.php"; 
$error = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["payment-type"]))
        $error['paymentTypeErr'] = "Please select a payment type";
    else 
        $paymentType = $_POST["payment-type"];
    

    if ($paymentType == "debit-credit") 
    {
        if (empty($_POST["card-number"])) 
            $error['cardNumberErr'] = "Card number is required";
        else {
            $cardNumber = test_input($_POST["card-number"]);
            // Check if card number only contains numbers and is 16 digits long
            if (!preg_match("/^[0-9]{16}$/", $cardNumber)) 
                $error['cardNumberErr'] = "Invalid card number";
            
        }

        if (empty($_POST["cvc"]))
            $error['cvcErr'] = "CVC is required";
        else {
            $cvc = test_input($_POST["cvc"]);
            // Check if CVC only contains numbers and is 3 digits long
            if (!preg_match("/^[0-9]{3}$/", $cvc)) 
                $error['cvcErr'] = "Invalid CVC";
            
        }
    } 
    else if ($paymentType == "easypaisa-jazzcash") 
    {
        if (empty($_POST["mobile-number"]))
            $error['mobileNumberErr'] = "Mobile number is required";
         else {
            $mobileNumber = test_input($_POST["mobile-number"]);
            // Check if mobile number only contains numbers and is 11 digits long
            if (!preg_match("/^[0-9]{11}$/", $mobileNumber)) 
                $error['mobileNumberErr'] = "Invalid mobile number";
            
        }
    }

    if (count($error) > 0) {
        // Data is invalid, redirect to payment.php
        $_SESSION['payment_error']=$error;
        header("Location:payment.php");
  
    } else {
        header("Location: thankyou.php");
      exit();
}

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>