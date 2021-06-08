<!DOCTYPE html>
<?php

/* Name: Lau King Hang, Student ID: 20006799S */

session_start();

$fnameErr = isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : '';
$lnameErr = isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : ''; 
$emailErr = isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ''; 
$modelErr = isset($_SESSION['modelErr']) ? $_SESSION['modelErr'] : ''; 
$mobileErr = isset($_SESSION['mobileErr']) ? $_SESSION['mobileErr'] : '';
$dateErr = isset($_SESSION['dateErr']) ? $_SESSION['dateErr'] : '';

$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : ' ';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : ' ';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ' ';
$mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : ' ';
$model = isset($_SESSION['model']) ? $_SESSION['model'] : ' ';
$pickup = isset($_SESSION['pickup']) ? $_SESSION['pickup'] : ' ';
?>

<html>
<title>Reserve the SmartPhone 4517</title>
<style>
h1 {text-align: center;}
div {text-align: center;}
form {text-align: center;}
.error {color: #FF0000;}
</style>
<body>
    <h1 style="text-align: center;">Reserve and Pick Up</h1>
    <p>Due to the strong demand, SmartPhone 4517 only accept a limited number of reservations. If you want to order the SmartPhone 4517, select retail stores and SmartPhone 4517 models. If, your SmartPhone 4517 booking application is successful, you will receive a unique reservation number.  Please note the reservation number and present it to the staff when you pick up your SmartPhone 4517 at your selected store.</p>
    <p>If you do not receive a unique reservation number, it means the order fails. Only the customers who receive an email can buy the SmartPhone 4517 at the stores. You can apply for booking the SmartPhone 4517 every weekday from 09:00 to 17:00. Please try again later to submit a reservation.</p>
    <tr>
    <td>
    
        <form method="POST" action="validateForm.php"> 
            <h3 style="text-align: center;"><span style="text-decoration: underline;">Selsect Store</span></h3>
            <span class="error"> </span>
            <!-- store selection -->
            <lable for="store">Pick-up Store</lable>
            <select name="store" id="store">
                <option value="1">IFC Mall</option>
                <option value="2">Festival Walk</option>
                <option value="3">Hysan Placel</option>
                <option value="4">APM</option>
            </select>
            <br/>
            <!-- model selection -->
            <h3 style="text-align: center;"><span style="text-decoration: underline;">Selsect Model</span></h3>
            <span class="error"> <?php echo $modelErr;?></span>
            <br/>
            <input type="radio" name="model" value="1" id="1"/>
            <label for="1">16 GB</label>
            <br/>
            <input type="radio" name="model" value="2" id="2"/>
            <label for="2">32 GB</label>
            <br/>
            <input type="radio" name="model" value="3" id="3"/>
            <label for="2">64 GB</label>
            <br/>
            <input type="radio" name="model" value="4" id="4"/>
            <label for="2">128 GB</label>
            <br/>

            <!-- Contact Info -->
            <h3 style="text-align: center;"><span style="text-decoration: underline;">Your Contact</span></h3>
            <label for="fname">First Name</label>
            <input id="fname" type="text" name="fname" placeholder="First Name" value=<?php echo $lname; ?>>
            <span class="error"> <?php echo $fnameErr;?></span>
            <br/>
            <label for="lname">Last Name</label>
            <input id="lname" type="text" name="lname" placeholder="last Name" value=<?php echo $lname; ?>>
            <span class="error"> <?php echo $lnameErr;?></span>
            <br/>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="example@example.com" value=<?php echo $email; ?>>
            <span class="error"> <?php echo $emailErr;?></span>
            <br/>
            <label for="mobile">Mobile</label>
            <input id="mobile" type="text" name="mobile" placeholder="mobile number" value=<?php echo $mobile; ?>>
            <span class="error"> <?php echo $mobileErr;?></span>
            <br/>
            
            <!-- pickup date field -->
            <label for="pickup">Date</label>
            <input id="pickup" type="date" name="pickup" required>
            <span class="error"> <?php echo $dateErr;?></span>
            <br/>
            <!-- form action type field -->
            <p></p>
            <input type="reset" id="reset" value="Reset"/>
            <br/>
            <input type="submit" id="btn-submit" value="Reserve Now"/>

        </form>
    
    </td>
    </tr>
    <div id="center_button">
    <button onclick="location.href='admin.php'">Go to Admin Page</button>
</div>
</body>
</html>