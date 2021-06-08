<?php

/* Name: Lau King Hang, Student ID: 20006799S */

session_start(); // start the session

echo "<h3>This is validateForm</h3>";
echo '<pre>';
var_dump($_POST);
echo '</pre>';
date_default_timezone_set('Asia/Hong_Kong');

$err = false;
$store = $_POST['store'];
$model = $_POST['model'];
$fname = $_POST['fname'];  
$lname = $_POST['lname'];
$email = $_POST['email']; 
$mobile = $_POST['mobile']; 
$pickup = $_POST['pickup'];
$today = date("Y-m-d");


//start checking
//model
if($model==""){
   $modelErr = "Model is required";
   $_SESSION['modelErr'] = $modelErr;
   $err=true;
}
else{
   $modelErr = "";
   $_SESSION['modelErr'] = $modelErr;
}

//first name
if($fname==""){
   $fnameErr = "First name is required";
   $_SESSION['fnameErr'] = $fnameErr;
   $err=true;
}
else{
   if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
      $_SESSION['fnameErr'] = $fnameErr;
      $err=true;
   }
   else{
       $_SESSION['fnameErr'] = "";
   }
}

//last name
if($lname==""){
   $lnameErr = "Last name is required";
   $_SESSION['lnameErr'] = $lnameErr;
   $err=true;
}
else{
   if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
      $_SESSION['lnameErr'] = $lnameErr;
      $err=true;
   }
   else{
      $_SESSION['lnameErr'] = "";
   }
}

//email
if($email==""){
   $emailErr = "Email is required";
   $_SESSION['emailErr'] = $emailErr;
   $err=true;
}
else{
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";
      $_SESSION['emailErr'] = $emailErr;
      $err=true;
   }
   else{
      $_SESSION['emailErr'] = "";
   }
}

//mobile
if($mobile==""){
   $mobileErr = "Mobile is required";
   $_SESSION['mobileErr'] = $mobileErr;
   $err=true;
}
else{
   if(!preg_match('/^[0-9]{8}+$/',$mobile)){
      $mobileErr = "Invalid mobile format";
      $_SESSION['mobileErr'] = $mobileErr;
      $err=true;
   }
   else{
      $_SESSION['mobileErr'] = "";
   }
}

//date

if(strcmp($today,$pickup)>=0){
   $dateErr = "Invalid pickup date";
   $_SESSION['dateErr'] = $dateErr;
   $err=true;
}
else{
   $_SESSION['dateErr'] = "";
}

//end of checking

if ( !$err ) {

   // mysqli (procedure) - start
   $conn = mysqli_connect('localhost', 'root', '', 'sehs4517');

   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   echo "Connected successfully<br/>";
    
   //$id    = ;
   $store = $_POST['store'];
   $model = $_POST['model'];
   $fname = $_POST['fname'];  
   $lname = $_POST['lname'];
   $email = $_POST['email']; 
   $mobile= $_POST['mobile']; 
   $pickup= $_POST['pickup'];
   
   $stmt = "insert into reservation(store,model,fname,lname,email,mobile,pickup) 
		values('" . $store . "','" . $model . "','" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $pickup . "')";

   $result = mysqli_query($conn, $stmt);
  
   echo "New records created successfully";

} else {
   header("Location: reserve.php"); 
}
?>

<?php 
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>