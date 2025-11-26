<!DOCTYPE html>
<html>
    <head>
        <title>LED Response</title>
    </head>
    <body>
        <h2>LED Control Results</h2>
            <?php
                header("Content-Type: application/json");
                // Full path to your bme280 binary
                $binary = "/home/clauie/raspberry-pi-bme280/bme280";
                // Make sure the binary exists and is executable
                if (!file_exists($binary)) {
                echo json_encode(["error" => "Binary not found at $binary"]);
                exit;
                }
                // Run the binary and capture output
                $output = shell_exec($binary);
                // Parse the values using regex
                preg_match("/Temp:\s*([0-9\.\-]+)/", $output, $temp);
                preg_match("/Pressure:\s*([0-9\.\-]+)/", $output, $press);
                preg_match("/Altitude:\s*([0-9\.\-]+)/", $output, $alt);
                // Return JSON response
                echo json_encode([
                "temperature" => $temp[1] ?? "N/A",
                "pressure"    => $press[1] ?? "N/A",
                "altitude"    => $alt[1] ?? "N/A"
                ]);
            ?>
        <br>
    </body>
</html>