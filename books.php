<?php
$servername = "localhost";
$username = "www-data";
$password = "password"; 
$dbname = "book_collection";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all read books
$sql = "SELECT * FROM books ORDER BY title ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Books | Volumes by Clauie</title>
<style>
body {
    font-family: "Georgia", serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
    padding: 40px 20px;
    text-align: center;
}
header { margin-bottom: 40px; }
h1 { font-size: 2rem; margin-bottom: 0.5rem; }
h2 { font-size: 1rem; font-weight: normal; color: #666; margin-top: 0; }

.bookshelf {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.book {
    position: relative;
    width: 140px;
    cursor: pointer;
}

.book img {
    width: 140px;
    height: 210px;
    object-fit: cover;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.book:hover img { transform: translateY(-5px); }

.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.75);
    color: #fff;
    opacity: 0;
    border-radius: 6px;
    padding: 10px;
    font-size: 0.85rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: opacity 0.3s ease;
}

.book:hover .overlay { opacity: 1; }

a.back {
    display: inline-block;
    margin-top: 40px;
    text-decoration: none;
    color: #333;
    border-bottom: 1px solid transparent;
    transition: all 0.3s;
}
a.back:hover { border-bottom: 1px solid #333; }

footer {
    margin-top: 60px;
    font-size: 0.8rem;
    color: #888;
}
</style>
</head>
<body>
<header>
    <h1>Books I've Read</h1>
    <h2>Volumes: A Reading Collection by Clauie</h2>
</header>

<section class="bookshelf">
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ratingStars = str_repeat("★", $row['rating']) . str_repeat("☆", 5 - $row['rating']);
        echo '<div class="book">';
        echo '<img src="images/' . $row['cover_image'] . '" alt="' . htmlspecialchars($row['title']) . '">';
        echo '<div class="overlay">';
        echo '<strong>' . htmlspecialchars($row['title']) . '</strong><br>';
        echo 'Rating: ' . $ratingStars . '<br>';
        echo 'Summary:<br>' . nl2br(htmlspecialchars($row['summary']));
        echo '</div></div>';
    }
} else {
    echo "<p>No books in your collection yet.</p>";
}
$conn->close();
?>
</section>

<a href="index.html" class="back">← Back to Home</a>

<footer>
© 2025 Volumes by Clauie
</footer>
</body>
</html>
