<?php
    // Run the BME280 binary
    $output = shell_exec("./bme280");
    // Split the output by spaces
    $parts = explode(" ", $output);
    
    $temperature = $parts[0] ?? "N/A";
    $pressure    = $parts[1] ?? "N/A";
    $altitude    = $parts[2] ?? "N/A";
    
    // Return JSON
    echo json_encode([
    "temperature" => $temperature,
    "pressure"    => $pressure,
    "altitude"    => $altitude
    ]);
?>