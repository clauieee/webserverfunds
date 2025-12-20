<?php
$text = $_POST['text'];

$servername = "localhost";
$username = "clauie";
$password = "clauie";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_POST['query'];
$ip_addr = $_SERVER['REMOTE_ADDR'];
$conn->query("INSERT INTO searches VALUES ('$query', '$ip_addr')");

$conn->close();
?>