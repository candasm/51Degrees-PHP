<?php

require_once __DIR__ . '/../vendor/autoload.php';

$fiftyOneDegrees = new PionixLabs\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/51Degrees-Lite.dat');
$_51d_meta_data = $fiftyOneDegrees->getMetadata();

// $_51d_meta_data global contains metadata for properties and values.

// Print description for the IsMobile property.
echo $_51d_meta_data['IsMobile']['Description'];
