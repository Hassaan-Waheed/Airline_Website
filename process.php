<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $dep = $_POST['dep'];
    $arr = $_POST['arr'];
    $date = $_POST['date'];

    $errors = array();
    $user_data=array();
    $user_data['name'] = $name;
    $user_data['cnic'] = $cnic;
    $user_data['email'] = $email;
    $user_data['dep'] = $dep;
    $user_data['arr'] = $arr;
    $user_data['date'] = $date;

    if (empty($name)) 
        $errors['name'] = "Please enter your name";

    if (empty($cnic)) 
        $errors['cnic'] = "Please enter your CNIC number";

     elseif (!preg_match('/^\d{5}-\d{7}-\d{1}$/', $cnic)) 
        $errors['cnic'] = "Please enter a valid CNIC number";

    if (empty($email)) 
        $errors['email'] = "Please enter your email";

     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = "Please enter a valid email address";

    if (empty($dep))
        $errors['dep'] = "Please enter your departure location";

    if (empty($arr))
        $errors['arr'] = "Please enter your arrival location";

    if (empty($date)) 
        $errors['date'] = "Please enter your travel date";

    elseif (strtotime($date) < time())
        $errors['date'] = "Please enter a future date";


    if (count($errors) > 0) 
    {
        $_SESSION['errors']=$errors;
        header("location:homepage.php");
        exit();
    } 
    else 
    {    
        $_SESSION['user_data']=$user_data;
        header("location:payment.php");
    }
}
?>
