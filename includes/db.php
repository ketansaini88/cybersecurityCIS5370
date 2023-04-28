<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cyberSecurity";

/*
$servername = "sql105.epizy.com";
$username = "epiz_34094246";
$password = "DMO8sd7ZCDj";
$dbname = "epiz_34094246_cybersecurityCIS5370";
*/


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>