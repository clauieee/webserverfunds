<?php
// Database connection
$servername = "localhost";
$username = "www-data";
$password = "password"; // Replace with your MySQL password
$dbname = "book_collection";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$title = $conn->real_escape_string($_POST['title']);
$author = $conn->real_escape_string($_POST['author']);
$genre = $conn->real_escape_string($_POST['genre']);
$custom_genre = isset($_POST['customGenre']) ? $conn->real_escape_string($_POST['customGenre']) : '';
$reason = $conn->real_escape_string($_POST['reason']);
$rating = intval($_POST['rating']);
$display_genre = ($genre === 'other') ? $custom_genre : $genre;

// --- Insert into recommendations table ---
$sql_rec = "INSERT INTO recommendations (title, author, genre, custom_genre, reason, rating)
            VALUES ('$title', '$author', '$genre', '$custom_genre', '$reason', $rating)";
$conn->query($sql_rec);

// --- Insert into books table ---
$sql_book = "INSERT INTO books (title, author, genre, cover_image, rating, summary)
             VALUES ('$title', '$author', '$display_genre', 'default_cover.jpg', $rating, '$reason')";
$conn->query($sql_book);

// Display confirmation message
echo "<h2>Thank you for your recommendation!</h2>";
echo "<p><strong>Title:</strong> $title<br/>";
echo "<strong>Author:</strong> $author<br/>";
echo "<strong>Genre:</strong> $display_genre<br/>";
echo "<strong>Rating:</strong> $rating<br/>";
echo "<strong>Reason:</strong><br/>" . nl2br($reason) . "</p>";
echo '<a href="recommend.html">← Back to form</a> | <a href="books.php">View Bookshelf</a>';

$conn->close();
?>
