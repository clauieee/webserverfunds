<!DOCTYPE html>
<html>
    <head>
        <title>LED Response</title>
    </head>
    <body>
        <h2>LED Control Results</h2>
            <?php
                $pin = 24;
                $state = htmlspecialchars($_POST['ledstate'] ?? 'off');
                // Set pin as output (only needs to run once, but harmless to run each time)
                system("gpio -g mode $pin out");
                // Write value using gpio command
                if ($state === "on") {
                system("gpio -g write $pin 1");
                $msg = "LED has been turned ON";
                } else {
                system("gpio -g write $pin 0");
                $msg = "LED has been turned OFF";
                }
                echo json_encode(["message" => $msg]);
            ?>
        <br>
    </body>
</html>