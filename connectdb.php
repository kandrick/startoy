<?php
$servername = "localhost";
$username = "root";
$password = "yuyayu";
$dbname = "startoy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>