
![51Degrees](https://51degrees.com/DesktopModules/FiftyOne/Distributor/Logo.ashx?utm_source=github&utm_medium=repository&utm_content=home&utm_campaign=native-php "THE Fastest and Most Accurate Device Detection") **Device Detection in Native PHP**

[![Build Status](https://travis-ci.org/candasm/51Degrees-PHP.svg?branch=master)](https://travis-ci.org/candasm/51Degrees-PHP)

##About

51Degrees for PHP can be installed by composer. Can be used like in basic examples.

##Important Information

Please note that the native PHP API is no longer actively developed. Instead please use the C-Extension or the Cloud Implementation.

Since native PHP is not capable of persistently storing data in memory the API is only capable of working in stream mode which relies on loading the bare minimum of the necessary headers and then using the data file on disk to perform detection. Normally in languages like Java and C# the headers would only be loaded once, upon the application start, and then reused for multiple detections However with native PHP this has to be done for every request which is slow and inefficient.

If you have root access to the server your website/service is running on consider using the C-Extension implementation.

If you are running in an environment with restricted access rights such as a WordPress blog on shared hosting then you should use the Cloud implementation.

This API is still maintained and is in the working order, but maintenance is only limited to bug fixes.

Also please note that the native PHP API requires files of version 3.1.

## Usage
### Basic Usage
[basic-usage.php](./examples/basic-usage.php)
```php
$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/tests/51Degrees-Lite.dat');
$_51d = $fiftyOneDegrees->getDeviceData();

// Detection results are stored in the $_51d global.
$isMobile = $_51d['IsMobile'];

// Use like:
if ($isMobile) {
    echo "<h3>Mobile device.</h3>";
} else {
    echo "<h3>Non-Mobile device.</h3>";
}
```

###Match Metrics
[match-metrics.php](./examples/match-metrics.php)
```php
$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/tests/51Degrees-Lite.dat');
$_51d = $fiftyOneDegrees->getDeviceData();

// Match metrics:
echo "<p>DeviceId: " . $_51d["DeviceId"] . "</p>";
echo "<p>Method: " . $_51d["Method"] . "</p>";
echo "<p>Difference: " . $_51d["debug_info"]["difference"] . "</p>";
```

###Metadata
To retrieve description for a particular property:
[metadata.php](./examples/metadata.php)
```php
$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/tests/51Degrees-Lite.dat');
$_51d_meta_data = $fiftyOneDegrees->getMetadata();

// $_51d_meta_data global contains metadata for properties and values.
// Print description for the IsMobile property.
echo $_51d_meta_data['IsMobile']['Description'];
```

To print all possible values for a chosen property:
[metadata-possible-values.php](./examples/metadata-possible-values.php)
```php
$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/tests/51Degrees-Lite.dat');
$_51d_meta_data = $fiftyOneDegrees->getMetadata();

// Shows all possible valus for the IsMobile property and a
// description for each value.
echo "<pre>";
var_dump($_51d_meta_data['IsMobile']['Values']);
echo "</pre>";
```

### Additional Options
51Degrees for PHP allows for some global values to change its behaviour.
If not set they will all use default options.

```php
$fiftyOneDegrees = new Candasm\FiftyOneDegrees\DeviceDetection();
$fiftyOneDegrees->setDataFilePath(__DIR__ . '/../resources/tests/51Degrees-Lite.dat');
/**
 * Controls if property values are set to their typed values or strings.
 * Defaults to TRUE, set to FALSE to disable.
 */
$fiftyOneDegrees->setReturnStrings(true);
// NOTE: Much of the metadata for this property has not been set,
// so you may see strings for things which should not be strings. }

/**
 * Controls which property values should be returned from detection. 
 * Greater performance can be gained from a restricted list of properties.
 * By default all values are returned.
 */
 $fiftyOneDegrees->setProperties(['IsMobile', 'HardwareModel', 'PlatformName', 'BrowserName']);
 $_51d = $fiftyOneDegrees->getDeviceData();
```