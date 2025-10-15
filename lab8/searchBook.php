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

        //Retrieve User Input for Search
        $genre = $_GET['genre'];
        echo "<h2>Search Results for Genre:<i>".htmlspecialchars($genre). "</i></h2>";

        //Retrieve Matching Books
        $sql = "SELECT title, author FROM books WHERE genre LIKE '%$genre%'";
        $result = mysqli_query($conn, $sql);
        ?>
    <body>    
        <?php
            if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Title</th><th>Author</th><th>Year Published</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
                echo "</tr>";
            }
            echo "</table><br/>";
            echo "<a href='addBook.html'>Add Another Book</a><br/>";
            echo "<a href='searchBook.html'>New Search</a>";
            } else {
            echo "<p style='color:red;'>No Books Found in This Genre.</p>";
            echo "<a href='searchBook.html'>Try again</a>";
            }
            $conn->close();
        ?>
    </body>
</html>