<?php
// $servername = "localhost";
// $username = "id20622180_khoobchand";
// $password = "Database@123";
// $db="id20622180_idiscuss";
$servername = "localhost";
$username = "root";
$password = "";
$db="idiscuss";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>