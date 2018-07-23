<?php

require_once __DIR__ . '/../vendor/autoload.php';

$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/51Degrees-Lite.dat');
$_51d = $fiftyOneDegrees->getDeviceData();

// Match metrics:
echo "<p>DeviceId: " . $_51d["DeviceId"] . "</p>";
echo "<p>Method: " . $_51d["Method"] . "</p>";
echo "<p>Difference: " . $_51d["debug_info"]["difference"] . "</p>";
