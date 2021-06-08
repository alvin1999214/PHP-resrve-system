<?php

/* Name: Lau King Hang, Student ID: 20006799S */

$host_name = "localhost";
$user_name = "root";
$pass_word = "";
$database_name = "SEHS4517";

//drop database
$conn = mysqli_connect($host_name, $user_name, $pass_word);

if(! $conn ){

  echo 'Connected failure<br>';
}
echo 'Connected successfully<br>';
$sql = "DROP DATABASE SEHS4517";
         
if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully".'<br>';
} 
else {
  echo "Error deleting record: " . mysqli_error($conn).'<br>';
}
mysqli_close($conn);

//create connection
$conn = new mysqli($host_name, $user_name, $pass_word);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//create database
$sql = "CREATE DATABASE SEHS4517;";

if ($conn->query($sql) === TRUE) {
  echo "Database created successfully".'<br>';
} else {
  echo "Error creating database: " . $conn->error.'<br>';
}
      
$conn->close();

//create connection
$conn = new mysqli($host_name, $user_name, $pass_word, $database_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//create table
$sql="CREATE TABLE reservation (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  store INT NOT NULL,
  model INT NOT NULL,
  fname VARCHAR(20) NOT NULL,
  lname VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  mobile VARCHAR(8) NOT NULL,
  pickup DATE NOT NULL 
  ) ENGINE=INNODB;";

if ($conn->query($sql) === TRUE) {
  echo "Table reservation created successfully".'<br>';
} else {
  echo "Error creating table: " . $conn->error.'<br>';
}

$conn->close();
?>