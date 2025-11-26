<html>
    <head>
        <title>LED Response</title>
    </head>
    <body>
        <h2>LED Control Results</h2>
            <?php
        
                $output = shell_exec("./bme280");
                echo $output;
            ?>
        <br>
    </body>
</html>.