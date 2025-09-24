<!DOCTYPE html>
<html>
    <head>
        <title>Library Response</title>
    </head>
    <body>
        <h2>Library Form Results</h2>
        <?php
            // Sanitize inputs from POST
            $title  = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $genre  = htmlspecialchars($_POST['genre']);
            echo "Hello reader!<br>";
            echo "The book you are recommending is: $title<br>";
            echo "The author of the book is: $author<br>";
            echo "Your chosen genre is: $genre<br>";
        ?>
    </body>
</html>
