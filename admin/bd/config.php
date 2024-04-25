<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "licoreria";

$link  = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}
