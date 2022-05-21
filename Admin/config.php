<?php
$siteurl = "http://localhost/food-delivery/";
$servername = "localhost";
$email = "root";
$password = "";
$dbname = "food_delivery_service";

$conn = new mysqli($servername, $email, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>