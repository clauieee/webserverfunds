<!Doctype html>
<html>
    <head>
        <?php
            //Database Connection Settings
            $server = "localhost";
            $username = "www-data";
            $password = "password";
            $database = "libraryDB";

            $conn = mysqli_connect($server, $username, $password, $database);
            if (!$conn)
                die("Connection Failed: {mysqli_connect_error()}");

            //Retrieve Form Data
            $title = $_POST['title'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];

            //Insert Book Data into Table (books)
            $sql = "INSERT INTO books (title, author, genre) 
                    VALUES ('$title', '$author', '$genre')";
        ?>
    </head>

    <body>
        <?php
            if ($conn->query($sql)==TRUE)
            {
                echo "<h2>Book Added Successfully!<h2/>";
                echo "Title: ".htmlspecialchars($title)."<br/>";
                echo "Author: ".htmlspecialchars($author)."<br/>";
                echo "Genre: ".htmlspecialchars($genre)."<br/>";
                
                echo "<a href='addBook.html'>Add Another Book </a><br/>";
                echo "<a href='searchBook.html'>Search for a Book </a><br/>";
            }
            else
            {
                echo "<p style='color:red;'>Error Adding Book:"
            }

            $conn->close();
        ?>
    </body>
</html>

