<?php
$servername = "db"; //or you could use hostname (service name if using docker-compose)
$username = "root";
$password = "rootpassword";
$dbname = "uascloud";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


