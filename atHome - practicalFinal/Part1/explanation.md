Flow:
    HTML form (index.html) collects a search query and submits it to a PHP script (search.php).
    The PHP script retrieves the client's IP address using $_SERVER['REMOTE_ADDR'].
    It logs the query and IP in a database (called searches).
    Redirect the user to Google search results using an HTTP header. 