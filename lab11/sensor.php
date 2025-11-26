<?php
    header("Content-Type: application/json");
    $binary = "/bme280";
    $output = shell_exec("$binary . 2>&1");
    $temperature = $pressure = $altitude = "N/A";
    if (preg_match("/Temp:\s*([0-9\.\-]+)/i", $output, $match)) {
    $temperature = $match[1];
    }
    if (preg_match("/Pressure:\s*([0-9\.\-]+)/i", $output, $match)) {
    $pressure = $match[1];
    }
    if (preg_match("/Altitude:\s*([0-9\.\-]+)/i", $output, $match)) {
    $altitude = $match[1];
    }
    // Return JSON
    echo json_encode([
    "temperature" => $temperature,
    "pressure"    => $pressure,
    "altitude"    => $altitude
    ]);
?>