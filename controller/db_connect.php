<?php 
$conn=mysqli_connect("localhost","root","","pengelompokan_skripsi");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
