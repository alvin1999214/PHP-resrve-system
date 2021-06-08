<!DOCTYPE html>
<?php

/* Name: Lau King Hang, Student ID: 20006799S */

session_start();

$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : ' ';
$upw = isset($_SESSION['upw']) ? $_SESSION['upw'] : ' ';
$adminErr = isset($_SESSION['adminErr']) ? $_SESSION['adminErr'] : ' ';
$pass = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
?>

<html>
<title>Admin Page of Reserve the SmartPhone 4517</title>
<style>
h1 {text-align: center;}
div {text-align: center;}
form {text-align: center;}
.error {color: #FF0000;}
</style>
<body>

<!-- Login selection -->
<form method="POST" action="adminValidation.php">
<h3 style="text-align: center;"><span style="text-decoration: underline;">Admin Login Page</span></h3>
    <label for="uname">Account: </label>
    <input id="uname" type="text" name="uname" value=<?php echo $uname; ?>>
    <br>
    <label for="upw">Password: </label>
    <input id="upw" type="password" name="upw" value=<?php echo $upw; ?>>
    <p></p>
    <br>
    <input type="submit" id="login" value="Login"/>
    <br>
    <span class="error"> <?php echo $adminErr;?></span>
</form>
<br>

<!-- back to reserve page  -->
<div id="center_button">
    <button onclick="location.href='reserve.php'">Back to Reserve Page</button>
</div>
</body>
</html>

<?php
if($pass=="passed"){
//get a connection for the database
//require_once('../SEHS4517/db.php');
$host_name = "localhost";
$user_name = "root";
$pass_word = "";
$database_name = "SEHS4517";
$conn = mysqli_connect($host_name, $user_name, $pass_word, $database_name);

//create a query for the database
$query = "SELECT id, store, model, fname, lname, email, mobile, pickup FROM reservation";

$response = @mysqli_query($conn, $query);

//list the title
if($response){
echo '<table align="left"
cellspacing="5" cellpadding="8">
    
<tr>
<td align="left"><b>ID</b></td>
<td align="left"><b>Store</b></td>
<td align="left"><b>Model</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Mobile</b></td>
<td align="left"><b>Pickup</b></td>
</tr>';

//convert 1~4 to name
while($row = mysqli_fetch_array($response)){
    if($row['store']==1){
        $store="IFC Mall";
    }
    else if($row['store']==2){
        $store="Festival Walk";
    }
    else if($row['store']==3){
        $store="Hysan Placel";
    }
    else{
        $store="APM";
    }

    if($row['model']==1){
        $model="16GB";
    }
    else if($row['model']==2){
        $model="32GB";
    }
    else if($row['model']==3){
        $model="64GB";
    }
    else{
        $model="128GB";
    }

    //print the data
    echo '<tr><td align="left">' .    
    $row['id'] . '</td><td align="left">' .   
    $store . '</td><td align="left">' .   
    $model . '</td><td align="left">' .   
    $row['fname'] . '</td><td align="left">' .   
    $row['lname'] . '</td><td align="left">' .   
    $row['email'] . '</td><td align="left">' .   
    $row['mobile'] . '</td><td align="left">' .    
    $row['pickup'] . '</td><td align="left">';

    echo'</tr>';
    
}
echo '<table>';
}
else{
    echo "Cannot issue database query<br/>";
    echo mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<html>
<head>
</head>

<body>

</body>
</html>