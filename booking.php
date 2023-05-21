<?php session_start();
if (isset($_SESSION['errors'])) 
{
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
 else 
    $errors = array();
  print_r($errors);
 ?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        <link rel="stylesheet" href="booking.css">
    </head>
    <body>

        <div class="div1">
            <ul>
                <li>
                    <a href="homepage.php">
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
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </li>

            </ul>
            
        </div>

        <div class="div3">
            <h1>Book your flight now!</h1>
            <form method="post" action="bookingprocess.php">
                <div class="form-container">
                  <div class="form-column">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" id="name" name="name" placeholder="Your full name">
                      <span class="error"><?php if (isset($errors['name'])) echo $errors['name']; ?></span>
                    </div>
          
                    <div class="form-group">
                      <label for="ssn">CNIC:</label>
                      <input type="text" id="cnic" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X">
                      <span class="error"><?php if (isset($errors['cnic'])) echo $errors['cnic']; ?></span>
                    </div>
          
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" placeholder="Your email address">
                      <span class="error"><?php if (isset($errors['email'])) echo $errors['email']; ?></span>
                    </div>
          
                    <div class="form-group">
                      <label for="departure">Departure:</label>
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
                    <span class="error"><?php if (isset($errors['dep'])) echo $errors['dep']; ?></span>
                    </div>
                  </div>
          
                  <div class="form-column">
                    <div class="form-group">
                      <label for="arrival">Arrival:</label>
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
                    <span class="error"><?php if (isset($errors['arr'])) echo $errors['arr']; ?></span>
                    </div>
          
                    <div class="form-group">
                      <label for="date">Date:</label>
                      <input  type="date"  name="date">
                      <span class="error"><?php if (isset($errors['date'])) echo $errors['date']; ?></span>
                    </div>
          
                    <div class="form-group">
                      <label>Payment Method:</label>
                      <div  id="payments" style="display: flex; margin-left: 1px;">
                        <input type="radio" id="debit" name="payment" value="debit">
                        <label for="debit">Debit/Credit Cards</label>

                        <input type="radio" id="easypaisa" name="payment" value="easypaisa">
                        <label for="easypaisa">EasyPaisa / JazzCash</label>
                      </div>
                      <span class="error"><?php if (isset($errors['paymentTypeErr'])) echo $errors['paymentTypeErr']; ?></span>
                      
                    </div>
          
                    <div class="form-group">
                      <input type="submit" value="Submit">
                 </form>


        </div>
        
        

        
    </body>

    

    

            

</html>
