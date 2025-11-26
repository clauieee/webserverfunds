<!DOCTYPE html>
<html>
    <head>
        <title>LED Response</title>
    </head>
    <body>
        <h2>LED Control Results</h2>
            <?php
                    // GPIO pin to control
                    $pin = 24;
                    // Sanitize POST input
                    $state = htmlspecialchars($_POST['ledstate']);
                    // Export pin if needed
                    if (!file_exists("/sys/class/gpio/gpio$pin")) {
                        file_put_contents("/sys/class/gpio/export", $pin);
                    }
                    // Set pin direction
                    file_put_contents("/sys/class/gpio/gpio$pin/direction", "out");
                    // Write desired state
                    if ($state === "on") {
                        file_put_contents("/sys/class/gpio/gpio$pin/value", "1");
                        echo "The LED has been turned <strong>ON</strong>.<br>";
                    } else {
                        file_put_contents("/sys/class/gpio/gpio$pin/value", "0");
                        echo "The LED has been turned <strong>OFF</strong>.<br>";
                    }
                ?>
        <br>
        
    </body>
</html>