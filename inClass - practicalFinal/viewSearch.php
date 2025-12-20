<?php

$servername = "localhost";
$username = "clauie";
$password = "clauie"; 
$dbname = "data";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>