<?php

/* Name: Lau King Hang, Student ID: 20006799S */

session_start();

echo "<h3>This is adminValidation</h3>";
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$uname = $_POST['uname'];
$upw = $_POST['upw'];

//check admin account and password
if($uname=="admin"&&$upw=="pass"){
    $adminErr = "";
    $_SESSION['adminErr'] = $adminErr;
    $_SESSION['pass'] = "passed";
}
else{
    $adminErr = "Wrong Account or Password";
    $_SESSION['adminErr'] = $adminErr;
    $_SESSION['pass'] = "";
}
header("Location: admin.php");
?>