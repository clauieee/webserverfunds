<?php
    // Run the BME280 binary
    $output = trim(shell_exec("/bme280"));
    // Split the output by spaces
    $parts = explode(" ", $output);
    // Return JSON
    echo json_encode([
    "temperature" => $parts[0] ?? "N/A",
    "pressure"    => $parts[1] ?? "N/A",
    "altitude"    => $parts[2] ?? "N/A"
    ]);
?>