<?php

require_once __DIR__ . '/../vendor/autoload.php';

$fiftyOneDegrees = new PionixLabs\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/51Degrees-Lite.dat');
$_51d = $fiftyOneDegrees->getDeviceData();

// Detection results are stored in the $_51d global.
$isMobile = $_51d['IsMobile'];

// Use like:
if ($isMobile) {
    echo "<h3>Mobile device.</h3>";
} else {
    echo "<h3>Non-Mobile device.</h3>";
}
