<?php
$servername = "localhost";
$username = "user";
$password = "clauie";
$dbname = "book_collection";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$filter_genre = isset($_POST['filter_genre']) ? $conn->real_escape_string($_POST['filter_genre']) : '';

$sql = "SELECT * FROM recommendations";
if ($filter_genre !== '') {
    $sql .= " WHERE genre='$filter_genre' OR custom_genre='$filter_genre'";
}

$result = $conn->query($sql);

echo '<h2>Book Recommendations</h2>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $display_genre = $row['genre'] === 'other' ? $row['custom_genre'] : $row['genre'];
        echo "<p><strong>Title:</strong> {$row['title']}<br/>";
        echo "<strong>Author:</strong> {$row['author']}<br/>";
        echo "<strong>Genre:</strong> {$display_genre}<br/>";
        echo "<strong>Rating:</strong> {$row['rating']}<br/>";
        echo "<strong>Reason:</strong><br/>" . nl2br($row['reason']) . "</p><hr/>";
    }
} else {
    echo "<p>No recommendations found.</p>";
}

$conn->close();
?>

<!-- Filter form -->
<form method="post">
    <label for="filter_genre">Filter by genre:</label>
    <input type="text" name="filter_genre" placeholder="Enter genre to filter">
    <button type="submit">Filter</button>
</form>
<a href="index.html">← Back to Home</a>
