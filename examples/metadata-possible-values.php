<?php

require_once __DIR__ . '/../vendor/autoload.php';

$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/51Degrees-Lite.dat');
$_51d_meta_data = $fiftyOneDegrees->getMetadata();

// Shows all possible valus for the IsMobile property and a
// description for each value.
echo "<pre>";
var_dump($_51d_meta_data['IsMobile']['Values']);
echo "</pre>";