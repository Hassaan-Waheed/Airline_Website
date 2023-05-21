<?php session_start();
if (isset($_SESSION['errors'])) 
{
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
 else 
    $errors = array();
 ?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate">
        <title>XYZ Ailrines</title>
        <link rel="stylesheet" href="homepage.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="div0">
            <img src="pictures/ross-parmly-rf6ywHVkrlY-unsplash.jpg" alt="">
            <img src="pictures/airplane-7359232__340.jpg" alt="">
            <img src="pictures/istockphoto-1277665848-612x612.jpg" alt="">
          </div>
          

            <div class="div1">
             <ul>
                <li><a href="homepage.php"><b>Home</b></a></li>
                <li><a href="aboutus.html"><b>About Us</b></a></li>
                <li><a href="booking.php"><b>Booking</b></a></li>
                <li><a href="schedule.php"><b>Schedule</b></a></li>
                <li><input type="text" placeholder="Search..">
                <button type="submit"><i class="fa fa-search"></i></button>
                </li>

            </ul>

         </div>


            <div class="div2">
                <h1 >
                     <b>Welcome!</b>
                </h1>

                <h2>
                    <p>XYZ arlines are excited to travel with you around the
                        <i>globe.</i>
                    </p>
                </h2>

                <h3>
                    <p>Our crew is professonal and our aircrafts are equipped with all the safety features beacause..<br>
                        <em> your safety</em>
                        is our number one priority</p>
                </h3>

            </div>

            <div class="div3">
                <h1>Book your flight now!</h1>
                <form action="process.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" style="margin-left: 30px;" placeholder="Please enter your full name" name="name">
                    <br>
                    <span class="error"><?php if (isset($errors['name'])) echo $errors['name']; ?></span>
                    <br>
                    <label for="CNIC">CNIC:</label>
                    <input type="text"  style="margin-left: 30px;" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" required="" >
                    <br>
                    <span class="error"><?php if (isset($errors['cnic'])) echo $errors['cnic'] ?></span>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" style="margin-left: 35px;" placeholder="Please enter your email" name="email"  required>
                    <br>
                    <span class="error"><?php if (isset($errors['email'])) echo $errors['email'] ?></span>
                    <br>
                    <label class="label-dropdown1" for="dep">Departure:</label>
                    <select name="dep" class="dropdown1">
                        <option value="New York">New York</option>
                        <option value="Los Angeles">Los Angeles</option>
                        <option value="London">London</option>
                        <option value="Paris">Paris</option>
                        <option value="Istanbul">Istanbul</option>
                        <option value="Tokyo">Tokyo</option>
                        <option value="Sydney">Sydney</option>
                        <option value="Johannesburg">Johannesburg</option>
                        <option value=Dubai>Dubai</option>
                        <option value=Beijing>Beijing</option>
                        <option value=Bogotá>Bogotá</option>
                        <option value=Lima>Lima</option>
                        <option value=Santiago>Santiago</option>
                        <option value=Stockholm>Stockholm</option>
                        <option value=Tallinn>Tallinn</option>
                    </select>
                    <br>
                    <span class="error"><?php if (isset($errors['dep'])) echo $errors['dep'] ?></span>
                    <br>
                    <label class="label-dropdown2" for="arr">Arrival:</label>
                    <select name="arr" class="dropdown2">
                        <option value="Los Angeles">Los Angeles</option>
                        <option value="Miami">Miami</option>
                        <option value="Paris">Paris</option>
                        <option value="Rome">Rome</option>
                        <option value="Moscow">Moscow</option>
                        <option value="Beijing">Beijing</option>
                        <option value="Auckland">Auckland</option>
                        <option value="Cape Town">Cape Town</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Shanghai">Shanghai</option>
                        <option value="Lima">Lima</option>
                        <option value="Santiago">Santiago</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Helsinki">Helsinki</option>
                    </select>
                    <br>
                    <span class="error"><?php if (isset($errors['arr'])) echo $errors['arr'] ?></span>
                    <br>
                    <label for="date">Date:</label>
                    <input  type="date" style="margin-left: 40px;" placeholder="When do you want to go?" name="date">
                    <br>
                    <span class="error"><?php if (isset($errors['date']))  echo $errors['date'] ?></span>
                    <button type="submit">Submit</button>
                </form>    

            </div>

            
            <hr/>

            <address>
                email:<a href="mailto:p200474@pwr.nu.edu.pk">p200474@pwr.nu.edu.pk</a>
                <br>
                Rafaqat Lab,Fast University
            </address>
            <script defer src="slider.js"></script>


        </div>

    </body>
    
</html>
