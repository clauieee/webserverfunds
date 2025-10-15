<?php
//Database Connection Settings
$servername = "localhost";
$username = "www-data";
$password = "password";
$dbname = "libraryDB";

$conn = new mysqli($servername, $username, $password, $dbname);


//Retrieve Form Data
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];

//Insert Book Data into Table (books)
$sql = "INSERT INTO books (title, author, genre) 
        VALUES ('$title', '$author', '$genre')";

if ($conn->query($sql)==TRUE)
{
    echo "<h2>Book Added Successfully!<h2/>";
    echo "Title: ".htmlspecialchars($title)."<br/>";
    echo "Author: ".htmlspecialchars($author)."<br/>";
    echo "Genre: ".htmlspecialchars($genre)."<br/>";
    
    echo "<a href='addBook.html'>Add Annother Book </a><br/>";
    echo "<a href='searchBook.html'>Search for a Book </a><br/>";
}
else
{
    echo "<p style='color:red;'>Error Adding Book:"
}

$conn->close();
?>

