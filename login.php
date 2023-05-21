<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
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

            </ul>

        </div>

        <div class="div2">
                <h1>Login</h1>
                <form action="loginProcess.php" method="post">
                    <label for="name">User Name:</label>
                    <input type="text"  placeholder="Please enter your user name" name="name">
                    <br>
                    <label for="name">Password:</label>
                    <input type="password"  placeholder="Please enter your passsword" name="password">
                    <br>
                    <span class="error"><?php if (isset($_GET['message']))  echo $_GET['message'] ?></span>
                    <div class="forgot-password">
                        <a href="forgotPassword.php">Forgot password?</a>
                    </div>
                    <br>
                    <button type="submit">Submit</button>
                </form>
        </div>  
    
        </body>

</html>