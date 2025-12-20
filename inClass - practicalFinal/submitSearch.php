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

$word = $conn->real_escape_string($_POST['word']);
$

$sql_data = "INSERT INTO term_list (word)
            VALUES ('$word')";
$conn->query($sql_data);

$sql_ip = "INSERT INTO term_list (ip)
            VALUES ('$_SERVER["REMOTE_ADDR"]')";
$conn->query($sql_ip);


$sql_term = "INSERT INTO term_list (word)
             VALUES ('$word')";
$conn->query($sql_data);

$sql_term = "INSERT INTO term_list (ip)
             VALUES ('$_SERVER["REMOTE_ADDR"]')";
$conn->query($sql_ip);

$conn->close();
?>
