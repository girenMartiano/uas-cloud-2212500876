<?php
$servername = "mysql-test"; //or you could use hostname (service name if using docker-compose)
$username = "root";
$password = "P@ssw0rd";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


