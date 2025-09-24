<!DOCTYPE html>
<html>
    <head>
        <title>ClauieReads - Digital Library Form</title>
    </head>
    <body>
        <h2>Digital Library - Book Request</h2>
        <form action="library_response.php" method="get">
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title">
            <br><br>
            <label for="author">Author Name:</label>
            <input type="text" id="author" name="author">
            <br><br>
            <label for="genre">Favorite Genre:</label>
            <select id="genre" name="genre">
            <option value="fiction">Fiction</option>
            <option value="nonfiction">Non-Fiction</option>
            <option value="mystery">Mystery</option>
            <option value="fantasy">Fantasy</option>
            <option value="sci-fi">Sci-Fi</option>
            </select>
            <br><br>
            <input type="submit" value="Search Library">
        </form>
    </body>
</html>