<!DOCTYPE html>
<html>
    <head>
        <title>LED Response</title>
    </head>
    <body>
        <h2>LED Control Results</h2>
            <?php
                $binary = "/lab11/bme280";
                $output = shell_exec($binary . " 2>&1");
                echo $output;
            ?>
        <br>
    </body>
</html>