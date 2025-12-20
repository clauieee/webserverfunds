index.html
    onkeyup
        triggers the function everytime the user presses a key (or release)

log.php
    receives the query asynchronously (AJAX)
    gets the user's IP using the $_SERVER['REMOTE_ADDR']
    logs both (query and ip) in the searches table (sql)

search.php
    same as Part1 - this logs the final search term and redirects the user to Google

Flow:
    user types in search box
    the onkeyup triggers the javascript function (xkey())
    javascript sends what is received by POST to log.php
    log.php receives query and ip of user
    it inserts query and ip in searches table (sql table)
    user continues types and each key press triggers the same process
    when user clicks submit, form submits by POST to search.php
    search.php logs the final query and ip then redirects users to google.com