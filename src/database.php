<?php
//concorida server
$server = 'bnc353.encs.concordia.ca';
$username = 'bnc353_2';
$password = 'DBTeam12';
$database = 'bnc353_2';

// Create connection
$conn = mysqli_connect($server, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>