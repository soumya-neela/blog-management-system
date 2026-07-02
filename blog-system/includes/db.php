<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "blog";
$port = 3307;

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>