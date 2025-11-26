<?php
    header("Content-Type: application/json");
    
    $output = trim(shell_exec("/bme280 2>&1"));
    
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